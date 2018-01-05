<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

// use App\Http\Requests\UserStoreRequest;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/enigma/challenge';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      $a = array($data['name'],$data['iskola']);
      $data['role'] = 5;
      return  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'slug' => str_slug($data['name']),
            'password' => bcrypt($data['password']),
            'bio' => json_encode($a, JSON_UNESCAPED_UNICODE),
        ]);
      //   $user->attachRole($request->role);
    }

    public function index(Request $request)
    {

        $this->validate($request, [
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:6|confirmed',
        ]);
        $a = array($request['name'],$request['iskola']);
        $request['role'] = 5;
        $request['slug'] = str_slug($request['name']);
        $request['bio'] = json_encode($a, JSON_UNESCAPED_UNICODE);
        $user = User::create($request->all());

        $user->attachRole($request->role);
        // User::create(request(['name', 'email', 'password']));

        auth()->login($user);

        return redirect()->to('/enigma/challenge');
    }

    public function showRegistrationForm()
    {
        abort(404);
    }
    //
    public function register()
    {
        // auth()->login($user);
        return redirect()->route('manage.dashboard');//abort(404);
    }
}
