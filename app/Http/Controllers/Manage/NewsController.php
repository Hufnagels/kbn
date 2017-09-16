<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadFile;
use App\Http\Requests\NewsValidationRequest;
use App\News;
use App\User;
use App\Category;
use App\Tag;
use Intervention\Image\Facades\Image;


class NewsController extends BackendController
{

    protected $paginateLimit = 10;
    protected $uploadPath;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        parent::__construct();
        $this->uploadPath = public_path(config('imageAttributes.image.news.directory'));
    }

    public function index(Request $request)
    {
      $onlyTrashed = FALSE;
      if( ($status = $request->get('status')) && $status == 'trash')
      {
        $newses = News::onlyTrashed()->with('author', 'category')->latest()->paginate($this->paginateLimit); //all();
        $newsCount = News::onlyTrashed()->count();
        $onlyTrashed = TRUE;
      }
      elseif ($status == 'published')
      {
        $newses = News::published()->with('author', 'category')->latest()->paginate($this->paginateLimit); //all();
        $newsCount = News::published()->count();

      }
      elseif ($status == 'scheduled')
      {
        $newses = News::scheduled()->with('author', 'category')->latest()->paginate($this->paginateLimit); //all();
        $newsCount = News::scheduled()->count();

      }
      elseif ($status == 'draft')
      {
        $newses = News::draft()->with('author', 'category')->latest()->paginate($this->paginateLimit); //all();
        $newsCount = News::draft()->count();

      }
      elseif ($status == 'own')
      {
        $newses = $request->user()->news()->with('author', 'category')->latest()->paginate($this->paginateLimit); //all();
        $newsCount = $request->user()->news()->count();

      }
      else
      {
        $newses = News::with('author', 'category')->latest()->paginate($this->paginateLimit); //all();
        $newsCount = News::count();

      }
      $statusList = $this->statuslist($request);
      return view('manage.news.index', compact('newses', 'newsCount', 'onlyTrashed', 'statusList'));//, ['users' => $users]);
    }

    public function show($id) { }

    public function create(News $post)
    {
        $tags = Tag::where('id', '<>', config('ownAttributes.default_tag.id'))->get();
        // $categories = Category::where('id', '<>', config('ownAttributes.default_category.id'))->get();
// dd($categories);
        return view('manage.news.create',compact('post', 'tags', 'categories'));
    }

    public function store(NewsValidationRequest $request)
    {
        $data = $this->handelRequest($request);

        $post = $request->user()->news()->create($data);

        $post->category()->sync($data['category_id']);
// dd($post);
        if(!empty($data['tags']))
        {
          $post->tags()->sync($data['tags'], false);
        } else {
          $post->tags()->sync([config('ownAttributes.default_tag.id')]); //array()
        }
        return redirect()->route('post.index')->with('message',__('manageNews.systemMessages.created'));
    }

    public function edit($id)
    {
      $tags = Tag::where('id', '<>', config('ownAttributes.default_tag.id'))->get();
      $post = News::findOrFail($id);
// dd( $post->tags()->allRelatedIds() );
// dd($post->image);
      return view('manage.news.edit', compact('post', 'tags'));//, ['users' => $users]);
    }

    public function update(NewsValidationRequest $request, $id)
    {
        $post = News::findOrFail($id);
        $oldImage = $post->image;
        $data = $this->handelRequest($request);

        $post->category()->sync($data['category_id']);
// dd($data);
        unset($data['slug']);
        $post->update($data);
/*
        if( $oldImage !== $post->image)
        {
          $this->removeImage($oldImage);
        }
*/
        if(!empty($data['tags']))
        {
          $post->tags()->sync($data['tags']);
        } else {
          $post->tags()->sync([config('ownAttributes.default_tag.id')]); //array()
        }


        return redirect()->route('post.index')->with('message',__('manageNews.systemMessages.updated'));
    }

    public function destroy($id)
    {
        News::findOrFail($id)->delete();
        return redirect()->route('post.index')->with('trash-message',[__('manageNews.systemMessages.deleted'), $id]);
    }

    public function forceDestroy($id)
    {
        $news = News::withTrashed()->findOrFail($id);
        $news->forceDelete();
        $news->tags()->detach();
        $news->category()->detach();
        $this->removeImage($news->image);

        return redirect('/manage/post?status=trash')->with('message',__('manageNews.systemMessages.forceDelete'));
    }

    public function restore($id)
    {
        $news = News::withTrashed()->findOrFail($id);
        $news->restore();

        return redirect()->back()->with('message',__('manageNews.systemMessages.restored'));
        // redirect()->route('post.index')
        // route('post.index')
    }

    /**
    *
    * FUNCTION SECTION
    */

    // With single fileupload without LFM
    public function handelRequest($request)
    {
        $data = $request->all();
        if($request['published_at'] <> NULL) $request['is_published'] = '1';

        if($request->hasFile('image'))
        {
          $image = $request->file('image');
          // dd($image);
          $fileName = $image->getClientOriginalName();
          $extension = $image->getClientOriginalExtension();

          $destination = $this->uploadPath;

          $successUpload = $image->move($destination, $fileName);
          if($successUpload)
          {
            $thumbWidth = config('ownAttributes.image.news.thumbnail.width');
            $thumbHeight = config('ownAttributes.image.news.thumbnail.height');
            $width = config('ownAttributes.image.news.width');
            $height = config('imageownAttributes.image.news.height');
            $thumbnail = str_replace(".{$extension}","_thumb.{$extension}", $fileName);
            Image::make($destination . "/" . $fileName)->resize($thumbWidth,$thumbHeight)->save($destination . "/" . $thumbnail);
            Image::make($destination . "/" . $fileName)->resize($width,$height)->save($destination . "/" . $fileName);
          }

          $data['image'] = $fileName;

        }

        return $data;
    }

    public function removeImage($image)
    {
      if ( ! empty($image))
      {
        $imagePath = $this->uploadPath. '/' . $image;
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $thumbnail = pathinfo($image, PATHINFO_FILENAME)."_thumb.".$ext;
        $thumbnailPath = $this->uploadPath. '/' . $thumbnail;
//dd($thumbnailPath);
        if( file_exists($imagePath)) unlink($imagePath);
        if( file_exists($thumbnailPath)) unlink($thumbnailPath);
      }
    }

    private function statusList($request)
    {
      return [
        'own' => $request->user()->news()->count(),
        'all' => News::count(),
        'published' => News::published()->count(),
        'scheduled' => News::scheduled()->count(),
        'draft' => News::draft()->count(),
        'trash' => News::onlyTrashed()->count()
      ];
    }
}
