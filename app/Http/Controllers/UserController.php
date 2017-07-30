<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
    //
    public function index(){
      $users = User::orderBy('id', 'asc')->paginate(2); //all();
      return view('manage.users.index')->withUsers($users);//, ['users' => $users]);
    }

    public function store(){

    }

    public function create(){

    }

    public function show(){

    }

    public function update(){

    }

    public function destroy(){

    }

    public function edit(){

    }
}
