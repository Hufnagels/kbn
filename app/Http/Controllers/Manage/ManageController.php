<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;

class ManageController extends BackendController
{
    //
    public function index()
    {
      return redirect()->route('manage.dashboard');
    }

    public function dashboard()
    {
      return view('manage.dashboard');
    }
}
