<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Http\Requests\NewsValidationRequest;
use App\News;
use App\User;
use App\Category;

class ManageNewsController extends BackendController
{

    protected $paginateLimit = 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        if($request['published_at'] <> NULL) $request['is_published']='1';
        $request->user()->news()->create($request->all());
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
