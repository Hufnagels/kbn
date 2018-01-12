<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

Use App\User;
Use App\News;
use App\Category;
use App\Instruction;
use App\Lession;
// use App\Http\Requests\UserUpdateRequest;


class ManageController extends BackendController
{
    //
    public function index()
    {
      // route redirected here from /home
      return redirect()->route('manage.dashboard');
    }

    public function dashboard()
    {
      if(\Auth::user()->hasRole('student'))
      {
        // $lessions = Lession::with('author')->published()->orderByDesc('published_at')->get();
        return redirect()->route('enigmatasks'); //view('manage.home.dashboards.student', compact('lessions'));
      }
      if(\Auth::user()->hasRole('teacher'))
      {
        $instructions = Instruction::with('author', 'lessions')->published()->orderByDesc('published_at')->get();
        return view('manage.home.dashboards.teacher', compact('instructions'));
      }
      if(\Auth::user()->hasRole('gamevisitor'))
      {
        // $lessions = Lession::with('author')->published()->orderByDesc('published_at')->get();
        $collection = User::select('name', 'created_at', 'bio')->whereRoleIs('student')->get()->groupBy(DB::raw('Date(created_at)'));
        $flattened = $collection->flatten(1);
// dd($flattened->all());
        $users = $flattened->all();
        return view('manage.home.dashboards.gamevisitor', compact('users'));
      }

        $collection = User::select('name', 'created_at', 'bio')->whereRoleIs('student')->get()->groupBy(DB::raw('Date(created_at)'));
        $flattened = $collection->flatten(1);
        $users = $flattened->all();
      return view('manage.home.dashboard', compact('users'));
    }

//     public function edit(Request $request)
//     {
//         $user = $request->user();
//
//         return view('manage.home.edit', compact('user'));
//     }
//
//     public function update(Request $request, $id)
//     {
// dd($request->id);
//       $user = User::findOrFail($id);
//       $user->name = $request->name;
//       $user->email = $request->email;
//       $user->bio = $request->bio;
//       $user->image = $request->image;
// dd($request);
//       if ( $request->password == NULL)
//       {
//         unset($user['password']);
//       } else {
//         $user->password = $request->password;
//       }
//       unset($user['email']);
//       unset($user['slug']);
//       // $user->email = $request->email;
// dd($request);
//       $user->bio = $request->bio;
//
//       if ( $request->password == NULL)
//       {
//         unset($user['password']);
//       } else {
//         $user->password = $request->password;
//       }
//       unset($user['role']);
//
//       $user->save();
//
//       return redirect()->back()->with('message', 'Profile updated successfully');
//     }
    public function filemanager(Request $request)
    {
      $fmType = 'Images';
      if( ($status = $request->get('status')) && $status == 'file')
      {
        $fmType = 'Files';
      }
      return view('manage.filemanager.index', compact('fmType'));
    }
}
