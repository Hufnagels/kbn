<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Http\Requests\CategoryDestroyRequest;

use App\Category;
use App\News;


class CategoriesController extends BackendController
{
    protected $paginateLimit = 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $onlyTrashed = FALSE;
        if( ($status = $request->get('status')) && $status == 'trash')
        {
          $categories = Category::onlyTrashed()->orderBy('title', 'asc')->paginate($this->paginateLimit); //all();
          $categoriesCount = Category::onlyTrashed()->count();
          $onlyTrashed = TRUE;
        }
        else
        {
          $categories = Category::with('news')->orderBy('title', 'asc')->paginate($this->paginateLimit);
          $categoriesCount = Category::count();

        }


        return view('manage.category.index', compact('categories','categoriesCount', 'onlyTrashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        return view('manage.category.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        Category::create($request->all());
        return redirect()->route('category.index')->with('message',__('manageCategory.systemMessages.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $category = Category::with('news')->findOrFail($id); //all();
      //$newses = News::with('category_id',$id)->first();
      return view('manage.category.edit', compact('category'));//, ['users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
      Category::findOrFail($id)->update( $request->all() );
      return redirect()->route('category.index')->with('message',__('manageCategory.systemMessages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // CategoryDestroyRequest $request,
      // Category::findOrFail($id)->delete();
      // return redirect()->route('category.index')->with('message','Category was deleted successfully');

      $category = Category::findOrFail($id);

      if( !($category->id == config('ownAttributes.default_category.id')) )

      {
        News::where('category_id', $id)->update(['category_id' => config('ownAttributes.default_category.id')] );
        $category->delete();
        return redirect()->route('category.index')->with('message', __('manageCategory.systemMessages.deleted'));
      }
      else
      {
        return redirect()->route('category.index')->with('error', 'Can not delete this category');
      }

    }

    public function forceDestroy($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        News::withTrashed()->where('category_id', $id)->update(['category_id' => config('ownAttributes.default_category.id')]);
        $category->forceDelete();


        return redirect('/manage/category?status=trash')->with('message',__('manageCategory.systemMessages.forceDelete'));
        // )->route('post.index'
    }

    public function restore($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        $category->restore();

        return redirect()->back()->with('message',__('manageCategory.systemMessages.restored'));
        // redirect()->route('post.index')
        // route('post.index')
    }
    /**
    *
    * FUNCTION SECTION
    */

}
