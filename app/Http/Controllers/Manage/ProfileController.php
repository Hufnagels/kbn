<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
Use App\User;
Use App\News;
use App\Category;
use App\Instruction;
use App\Lession;
use App\Http\Requests\UserUpdateRequest;

class ProfileController extends BackendController
{
    //
    public function index()
    {
      // route redirected here from /home
      return redirect()->route('manage.dashboard');
    }

    public function create() { }

    public function store(UserStoreRequest $request, $id) { }

    public function show($id)
    {
      // dd($id);
      if(\Auth::user()->id != $id)
      {
          return view('errors.404');
      }
      $user = User::findOrFail($id); //all();
      return view('manage.home.edit', compact('user'));//, ['users' => $users]);
    }

    public function edit(Request $request, $id)
    {
      dd($id);
        $user = User::findOrFail($id);

        return view('manage.home.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
// dd($id);
      if(\Auth::user()->id != $id)
      {
          return view('errors.404');
      }
      $user = User::findOrFail($id);
      $user->bio = $request->bio;
// dd($request);
      if ( $request->password == NULL)
      {
        unset($user['password']);
      } else {
        $user->password = $request->password;
      }
      unset($user['name']);
      unset($user['email']);
      unset($user['slug']);
      unset($user['image']);
// dd($request);


// dd($user);
      $user->save();

      return redirect()->back()->with('message', 'Sikeresen módosítva');
    }

}
