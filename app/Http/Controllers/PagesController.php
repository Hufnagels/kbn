<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mapper;
use Carbon\Carbon;

use App\News;
use App\User;
use App\Category;
use App\Tag;
use App\Testimonial;
use App\Http\Requests\ContactEmailValidationRequest;
use App\Jobs\ContactEmail;
use App\Notifications\ContactSended;

use Hash;
use Session;
use Input;

class PagesController extends Controller
{
    // protected $paginateLimit = 5;
    public function download(Request $request)
    {
      $lfmFolder = "/" . config('lfm.files_folder_name') . "/" . config('lfm.shared_folder_name');
      $sourceFile = $request->get('f');
      $downloadPath = public_path() . $lfmFolder . $sourceFile;

      if( $status = $request->get('f') )
      {
        if( file_exists($downloadPath))
        {
// dd($downloadPath);
          return response()->download($downloadPath);
        } else {
          return back()->with('message','A keresett file nem található');
        }
      }
      return back()->withInput();
    }

    public function getIndex(){

      return view('simplePages.index');
    }

    public function getAbout(){
      return view('simplePages.about');
    }

    public function getTeam(){
      return view('simplePages.team');
    }

    public function getContact(){
      Mapper::map(
        47.4875518,
        19.0335221,
        [
            'zoom' => 15,
            'center' => true,
            'scrollWheelZoom' => false,
            'fullscreenControl' => false,
        ]
      );

      return view('simplePages.contact');
    }

    public function postContact(ContactEmailValidationRequest $request){

      // $this->validate($request,[
      //   'name' => 'required',
      //   'email' => 'required|email',
      //   'message' =>'required',
      //   'g-recaptcha-response' => 'required|captcha',
      // ]);

      $data = [
              'name' => $request->get('name'),
              'email' => $request->get('email'),
              'message' => $request->get('message'),
          ];
          /**
          * User::create() helyett contact::create() kell
          */
      // \Mail::to($user)->send(new contactus($user));
      $job = (new ContactEmail($data,'App\Contact'));
      dispatch($job);

      //\Mail::send('emails.webcontact', ['user' => $data], function ($m) use ($data) {
      //
      //      $m->from($data['email'], $data['name']);
      //
      //      $m->to('kbvconsulting@gmail.com', 'admin')
      //        ->subject('From Your Website (a new contact): ' );
      //
      //  });
      return redirect()->route('contact')->with('success', __('simplePages.contactForm.success'));
    }
}
