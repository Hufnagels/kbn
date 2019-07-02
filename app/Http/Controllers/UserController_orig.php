<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;
use Hash;
use Session;
use Input;

class UsersController extends Controller
{
    //
    protected $paginationLimit = 10;
    public function index(){
      $users = User::orderBy('id', 'asc')->paginate($this->paginationLimit); //all();
      return view('manage.users.index')->withUsers($users);//, ['users' => $users]);
    }

    public function store(Request $request){

      $this->validate($request, [
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users'
      ]);

      if ($request->has('password') && !empty('$request->password'))
      {
        $password = trim($request->password);
      } else {
        //set auto generated password
        $length = 10;
        $keyspace = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i)
        {
          $str .= $keyspace[random_int(0, $max)];
        }
        $password = $str;
      }

      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($password);
      $user->save();

      if ($request->roles) {
        $user->syncRoles(explode(',', $request->roles));
      }

      if($user->save())
      {
        return redirect()->route('users.show', $user->id);
      } else {
        Session::flash('is-danger','Sorry, user can not be created');
        return redirect()->route('users.create');
      }
    }

    public function create(){
      $roles = Role::all();
      return view('manage.users.create')->withRoles($roles);
      //return view('manage.users.create');
    }

    public function show($id){
      //$user = User::findOrFail($id);
      $roles = Role::all();
      $user = User::where('id', $id)->with('roles')->first();
      return view('manage.users.show')->withUser($user)->withRoles($roles);
    }

    public function update(Request $request, $id){

      $this->validate($request, [
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users,email,'.$id
      ]);

      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->email = $request->email;

      if ($request->password_options =='auto')
      {
        //set auto generated password
        $length = 10;
        $keyspace = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i)
        {
          $str .= $keyspace[random_int(0, $max)];
        }
        $user->password = Hash::make($str);

      } elseif ($request->password_options =='manual') {
        $user->password = Hash::make($request->password);
      }

      $user->syncRoles(explode(',', $request->roles));


      if ($user->save())
      {
        return redirect()->route('users.show', $id);
      } else {
        Session::flush('error', 'Problem updating user');
        return redirect()->route('manage.users.edit', $id);
      }

    }

    public function destroy($id){
      $user = User::findOrFail($id);
      return view('manage.users.destroy')->withUser($user);
    }

    public function edit($id){
      $roles = Role::all();
      $user = User::where('id', $id)->with('roles')->first();
      //$user = User::findOrFail($id);
      return view('manage.users.edit')->withUser($user)->withRoles($roles);
    }
}
