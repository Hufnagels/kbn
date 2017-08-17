<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
Use App\User;
Use App\News;
use App\Category;

class ManageController extends BackendController
{
    //
    public function index()
    {
      // latest 3 post
      // last login
      // 
      return redirect()->route('manage.dashboard');
    }

    public function dashboard()
    {
      return view('manage.dashboard');
    }
}
