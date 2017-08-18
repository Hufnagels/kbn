<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadFile;
use App\Http\Requests\NewsValidationRequest;
use App\News;
use App\User;
use App\Category;
use Intervention\Image\Facades\Image;


class ManageNewsController extends BackendController
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(News $post)
    {
        return view('manage.news.create',compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsValidationRequest $request)
    {
        $data = $this->handelRequest($request);
        // if($request['published_at'] <> NULL) $request['is_published']='1';
        $request->user()->news()->create($data);
        return redirect()->route('post.index')->with('message','News was created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      // $item = News::with('author', 'category')->where('id', $id); //all();
      // dd($item);
      // return view('manage.news.show', compact('item'));//, ['users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post = News::findOrFail($id); //all();
      return view('manage.news.edit', compact('post'));//, ['users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsValidationRequest $request, $id)
    {
        $post = News::findOrFail($id);

        $oldImage = $post->image;

        $data = $this->handelRequest($request);
        $post->update($data);

        if( $oldImage !== $post->image)
        {
          $this->removeImage($oldImage);
        }

        return redirect()->route('post.index')->with('message','News was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**/
    public function destroy($id)
    {
        News::findOrFail($id)->delete();
        return redirect()->route('post.index')->with('trash-message',['News has been moved to Trash', $id]);

    }

    public function forceDestroy($id)
    {
        $news = News::withTrashed()->findOrFail($id);
        $news->forceDelete();
        $this->removeImage($news->image);


        return redirect('/manage/post?status=trash')->with('message','News has been deleted permanently');
        // )->route('post.index'
    }

    public function restore($id)
    {
        $news = News::withTrashed()->findOrFail($id);
        $news->restore();

        return redirect()->back()->with('message','News has been Restored');
        // redirect()->route('post.index')
        // route('post.index')
    }

    /**
    *
    * FUNCTION SECTION
    */

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
            $thumbWidth = config('imageAttributes.image.news.thumbnail.width');
            $thumbHeight = config('imageAttributes.image.news.thumbnail.height');
            $width = config('imageAttributes.image.news.width');
            $height = config('imageAttributes.image.news.height');
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
