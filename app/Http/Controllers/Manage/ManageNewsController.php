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

    public function index()
    {
      $newses = News::with('author', 'category')->orderBy('id', 'desc')->paginate($this->paginateLimit); //all();
      $newsCount = News::count();
      return view('manage.news.index', compact('newses', 'newsCount'));//, ['users' => $users]);
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
            $thumbHeight = config('imageAttributes.image.news.thumbnail.width');
            $width = config('imageAttributes.image.news.width');
            $height = config('imageAttributes.image.news.width');
            $thumbnail = str_replace(".{$extension}","_thumb.{$extension}", $fileName);
            Image::make($destination . "/" . $fileName)->resize($thumbWidth,$thumbHeight)->save($destination . "/" . $thumbnail);
            Image::make($destination . "/" . $fileName)->resize($width,$height)->save($destination . "/" . $fileName);
          }

          $data['image'] = $fileName;

        }
        return $data;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $item = News::with('author', 'category')->where('id', $id); //all();
      dd($item);
      return view('manage.news.show', compact('item'));//, ['users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $news = News::where('id', $id); //all();
      return view('manage.news.edit', compact('news'));//, ['users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
