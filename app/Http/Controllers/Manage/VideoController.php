<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;

use App\Http\Requests\VideoValidationRequest;
use App\Video;
use App\User;
use App\Category;
use App\Tag;
use Intervention\Image\Facades\Image;

class VideoController extends BackendController
{
    protected $paginateLimit = 50;


    public function index(Request $request)
    {
        $onlyTrashed = FALSE;

        if( ($status = $request->get('status')) && $status == 'trash')
        {
          $videos = Video::onlyTrashed()->with('author', 'category')->latest()->paginate($this->paginateLimit); //all();
          $videoCount = Video::onlyTrashed()->count();
          $onlyTrashed = TRUE;
        }
        elseif ($status == 'published')
        {
          $videos = Video::published()->with('author', 'category')->latestFirst()->paginate($this->paginateLimit); //all();
          $videoCount = Video::published()->count();

        }
        elseif ($status == 'scheduled')
        {
          $videos = Video::scheduled()->with('author', 'category')->latestFirst()->paginate($this->paginateLimit); //all();
          $videoCount = Video::scheduled()->count();

        }
        elseif ($status == 'draft')
        {
          $videos = Video::draft()->with('author', 'category')->latest()->paginate($this->paginateLimit); //all();
          $videoCount = Video::draft()->count();

        }
        elseif ($status == 'own')
        {
          $videos = $request->user()->video()->with('author', 'category')->latestFirst()->paginate($this->paginateLimit); //all();
          $videoCount = $request->user()->video()->count();

        }
        else
        {
          $videos = Video::with('author', 'category')->latestFirst()->paginate($this->paginateLimit); //all();
          $videoCount = Video::count();

        }
        $statusList = $this->statuslist($request);
        return view('manage.video.index', compact('videos', 'videoCount', 'onlyTrashed', 'statusList'));//, ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Video $video)
    {
        $tags = Tag::where('id', '<>', config('ownAttributes.default_tag.id'))->get();
        return view('manage.video.create',compact('video', 'tags'));
    }

    public function store(VideoValidationRequest $request)
    {
        $data = $this->handelRequest($request);
// dd($data);
        $video = $request->user()->video()->create($data);
        if(!empty($data['category_id']))
        {
            $video->category()->sync($data['category_id']);
        } else {
            $video->category()->sync([config('ownAttributes.default_category.id')]); //array()
        }

        if(!empty($data['tags']))
        {
          $video->tags()->sync($data['tags'], false);
        }
        // else {
        //   $video->tags()->sync([config('ownAttributes.default_tag.id')]); //array()
        // }
        return redirect()->route('video.index')->with('message',__('manageVideo.systemMessages.created'));
    }

    public function show($id){ }

    public function edit($id)
    {
      $tags = Tag::where('id', '<>', config('ownAttributes.default_tag.id'))->get();
      $video = Video::findOrFail($id);
// dd( $video->tags()->allRelatedIds() );
      return view('manage.video.edit', compact('video', 'tags'));
    }

    public function update(VideoValidationRequest $request, $id)
    {
      $video = Video::findOrFail($id);
      $data = $this->handelRequest($request);

      if(!empty($data['category_id']))
      {
          $video->category()->sync($data['category_id']);
      } else {
          $video->category()->sync([config('ownAttributes.default_category.id')]); //array()
      }
// dd($data);
      // unset($data['slug']);
      $video->update($data);

      if(!empty($data['tags']))
      {
        $video->tags()->sync($data['tags']);
      } else {
        $video->tags()->sync([config('ownAttributes.default_tag.id')]); //array()
      }


      return redirect()->route('video.index')->with('message',__('manageVideo.systemMessages.updated'));
    }

    public function destroy($id)
    {
        Video::findOrFail($id)->delete();
        return redirect()->route('video.index')->with('trash-message',[__('manageVideo.systemMessages.deleted'), $id]);
    }

    public function forceDestroy($id)
    {
        $video = Video::withTrashed()->findOrFail($id);
        $video->forceDelete();
        $video->tags()->detach();
        $video->category()->detach();
        //$this->removeImage($video->image);

        return redirect('/manage/video?status=trash')->with('message',__('manageVideo.systemMessages.forceDelete'));
    }

    public function restore($id)
    {
        $video = Video::withTrashed()->findOrFail($id);
        $video->restore();

        return redirect()->back()->with('message',__('manageVideo.systemMessages.restored'));
        // redirect()->route('post.index')
        // route('post.index')
    }

    // OWN FUNCTIONS
    private function statusList($request)
    {
      return [
        'own' => $request->user()->video()->count(),
        'all' => Video::count(),
        'published' => Video::published()->count(),
        'scheduled' => Video::scheduled()->count(),
        'draft' => Video::draft()->count(),
        'trash' => Video::onlyTrashed()->count()
      ];
    }

    public function handelRequest($request)
    {
        $data = $request->all();

        // CHECK YOUTUBE VIDEO ID
        $requestVideoURL = $request['url'];
        preg_match('/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/', $requestVideoURL, $videoId);
        if ($request['yt_video_id'] !== $videoId[1])
        {
            $request['yt_video_id'] = $videoId[1];
        }

        // if(empty($data['category_id']))
        // {
        //   unset($data['category_id']);
        // }

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
}
