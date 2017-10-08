<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserDestroyRequest;

use App\User;
use App\News;
use App\Role;


class UsersController extends BackendController
{
    protected $paginateLimit = 50;
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
          $users = User::onlyTrashed()->orderBy('name', 'asc')->paginate($this->paginateLimit); //all();
          $usersCount = User::onlyTrashed()->count();
          $onlyTrashed = TRUE;
        }
        else
        {
// dd(
//     class_uses(\App\User::class),
//     get_class_methods(\App\User::first())
// );
          $users = User::orderBy('name', 'asc')->paginate($this->paginateLimit);
          // $roles = Role::get();
// dd($roles[0]->display_name);
          $usersCount = User::count();
        }
        return view('manage.users.index', compact('users','usersCount', 'onlyTrashed'));
    }

    public function create()
    {
        $user = new User();
        return view('manage.users.create',compact('user'));
    }

    public function store(UserStoreRequest $request)
    {
//dd($request);
        if ( $request->password == NULL)
        {
          unset($user['password']);
        }
        $user = User::create($request->all());
        $user->attachRole($request->role);
        return redirect()->route('users.index')->with('message',__('manageUser.systemMessages.created'));
    }

    public function show($id) { }

    public function edit($id)
    {
      $user = User::findOrFail($id); //all();
      return view('manage.users.edit', compact('user'));//, ['users' => $users]);
    }

    public function update(UserUpdateRequest $request, $id)
    {
      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->email = $request->email;
      $user->bio = $request->bio;
      $user->image = $request->image;
// dd($request);
      if ( $request->password == NULL)
      {
        unset($user['password']);
      }
      $user->save();
      $user->detachRole($user->role);
      $user->attachRole($request->role);

      // ->update( $request->all() );
      return redirect()->route('users.index')->with('message',__('manageUser.systemMessages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDestroyRequest $request,$id)
    {

      $user = User::findOrFail($id);
      $news = News::where('author_id', $id);

      if( ( $user->id == config('userAttributes.users_default.id'))  )
      {
        return redirect()->route('users.index')->with('error', __('manageUser.systemMessages.cantDelete'));
      }
      elseif ( $news->count()  )
      {
        $users = User::where('id','!=', $user->id)->pluck('name', 'id');
        return view('manage.users.confirm', compact('user', 'users'));
      }
      else
      {
        $user->delete();
        return redirect()->route('users.index')->with('message', __('manageUser.systemMessages.deleted'));
      }

    }

    public function confirm(UserDestroyRequest $request,$id)
    {
      $user = User::findOrFail($id);
      $deletedOption = $request->delete_option;
      if($deletedOption == 'attribute')
      {
        $attributeUser = $request->selected_user;
        $user->news()->update(['author_id' => $attributeUser]);
        $user->withTrashed()->forceDelete();
        $user = User::findOrFail($attributeUser);
        return redirect()->route('users.index')->with('message', __('manageUser.systemMessages.deleteWithTransfer').$user->name);
      }
      elseif($deletedOption == 'delete')
      {
        $newses = $user->news();
        //$newses = News::where('author_id', $id)->get();
        foreach ($newses as $news) {
            $this->removeImage($news->image, public_path(config('imageAttributes.image.news.directory')));
        }

        $newses->withTrashed()->forceDelete();
        $user->forceDelete();
        return redirect()->route('users.index')->with('message', __('manageUser.systemMessages.deleteAll'));
      }
    }

    public function forceDestroy($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->forceDelete();

        return redirect('/manage/users?status=trash')->with('message',__('manageUser.systemMessages.forceDelete'));
        // )->route('post.index'
    }

    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();

        return redirect()->back()->with('message',__('manageUser.systemMessages.restored'));
        // redirect()->route('post.index')
        // route('post.index')
    }
    /**
    *
    * FUNCTION SECTION
    */
    public function removeImage($image, $uploadPath)
    {
      if ( ! empty($image))
      {
        $imagePath = $uploadPath. '/' . $image;
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $thumbnail = pathinfo($image, PATHINFO_FILENAME)."_thumb.".$ext;
        $thumbnailPath = $uploadPath. '/' . $thumbnail;
        if( file_exists($imagePath)) unlink($imagePath);
        if( file_exists($thumbnailPath)) unlink($thumbnailPath);
      }
    }
}
