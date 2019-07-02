<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;

use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Http\Requests\TagDestroyRequest;

use App\Tag;
use App\News;
use App\Video;
use App\Photo;

class TagController extends BackendController
{
    protected $paginateLimit = 50;

    public function index(Request $request)
    {
        $onlyTrashed = FALSE;
        if( ($status = $request->get('status')) && $status == 'trash')
        {
          $tags = Tag::onlyTrashed()->orderBy('name', 'asc')->paginate($this->paginateLimit); //all();
          $tagsCount = Tag::onlyTrashed()->count();
          $onlyTrashed = TRUE;
        }
        else
        {
          $tags = Tag::orderBy('name', 'asc')->paginate($this->paginateLimit);
          $tagsCount = Tag::count();
        }

        return view('manage.tag.index', compact('tags','tagsCount', 'onlyTrashed'));
    }

    public function create()
    {
        $tag = new Tag();
        return view('manage.tag.create',compact('tag'));
    }

    public function store(TagStoreRequest $request)
    {
        Tag::create($request->all());
        return redirect()->route('tag.index')->with('message',__('manageTag.systemMessages.created'));
    }


    public function edit($id)
    {
      $tag = Tag::findOrFail($id); //all();
// dd($tag->news);
      return view('manage.tag.edit', compact('tag'));//, ['users' => $users]);
    }

    public function update(TagUpdateRequest $request, $id)
    {
      Tag::findOrFail($id)->update( $request->all() );
      return redirect()->route('tag.index')->with('message',__('manageTag.systemMessages.updated'));
    }


    public function destroy($id)
    {
      $tag = Tag::findOrFail($id);

      if( !($tag->id == config('ownAttributes.default_tag.id')) )
      {
        foreach($tag->news as $news)
        {
          // $news->tags()->sync( config('ownAttributes.default_tag.id') );
        }
        // \DB::enableQueryLog();

        // dd(\DB::getQueryLog());
        $tag->delete();
        return redirect()->route('tag.index')->with('message', __('manageTag.systemMessages.deleted'));
      }
      else
      {
        return redirect()->route('tag.index')->with('error', __('manageTag.systemMessages.cantDelete'));
      }

    }

    public function forceDestroy($id)
    {
        $tag = Tag::withTrashed()->findOrFail($id);
        foreach($tag->news as $news)
        {
          $news->tags()->sync( config('ownAttributes.default_tag.id') );
        }
        $tag->forceDelete();


        return redirect('/manage/tag?status=trash')->with('message',__('manageTag.systemMessages.forceDelete'));
        // )->route('post.index'
    }

    public function restore($id)
    {
        $tag = Tag::withTrashed()->findOrFail($id);
        $tag->restore();
        return redirect()->back()->with('message',__('manageTag.systemMessages.restored'));
    }
}
