<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Symfony\Component\HttpFoundation\File\UploadFile;
use App\Http\Requests\TestimonialValidationRequest;
use App\User;
use App\Testimonial;

class TestimonialController extends BackendController
{

  protected $paginateLimit = 50;
  protected $uploadPath;

     public function __construct()
     {
         parent::__construct();
         // $this->uploadPath = public_path(config('imageAttributes.image.news.directory'));
     }

     public function index(Request $request)
     {
       $onlyTrashed = FALSE;
       if( ($status = $request->get('status')) && $status == 'trash')
       {
         $testimonials = Testimonial::onlyTrashed()->with('author')->latest()->paginate($this->paginateLimit); //all();
         $testimonialCount = Testimonial::onlyTrashed()->count();
         $onlyTrashed = TRUE;
       }
       elseif ($status == 'published')
       {
         $testimonials = Testimonial::published()->with('author')->latest()->paginate($this->paginateLimit); //all();
         $testimonialCount = Testimonial::published()->count();

       }
       elseif ($status == 'scheduled')
       {
         $testimonials = Testimonial::scheduled()->with('author')->latest()->paginate($this->paginateLimit); //all();
         $testimonialCount = Testimonial::scheduled()->count();

       }
       elseif ($status == 'draft')
       {
         $testimonials = Testimonial::draft()->with('author')->latest()->paginate($this->paginateLimit); //all();
         $testimonialCount = Testimonial::draft()->count();

       }
       elseif ($status == 'own')
       {
         $testimonials = $request->user()->testimonial()->with('author')->latest()->paginate($this->paginateLimit); //all();
         $testimonialCount = $request->user()->news()->count();

       }
       else
       {
         $testimonials = Testimonial::with('author')->latest()->paginate($this->paginateLimit); //all();
         $testimonialCount = Testimonial::count();

       }
       $statusList = $this->statuslist($request);
       return view('manage.welcome.testimonial.index', compact('testimonials', 'testimonialCount', 'onlyTrashed', 'statusList'));//, ['users' => $users]);
     }


     public function create(Testimonial $testimonial)
     {
         return view('manage.welcome.testimonial.create',compact('testimonial'));
     }

      public function store(TestimonialValidationRequest $request)
      {
          $data = $request->all();

          $testimonial = $request->user()->testimonial()->create($data);

          return redirect()->route('testimonial.index')->with('message',__('manageTesti.systemMessages.created'));
      }


     public function show($id) { }

     public function edit($id)
     {
       $testimonial = Testimonial::findOrFail($id);
       return view('manage.welcome.testimonial.edit', compact('testimonial'));
     }

     public function update(TestimonialValidationRequest $request, $id)
     {
         $testimonial = Testimonial::findOrFail($id);
         $data = $request->all();
         unset($data['slug']);
         $testimonial->update($data);
         return redirect()->route('testimonial.index')->with('message',__('manageTesti.systemMessages.updated'));
     }

     public function destroy($id)
     {
       Testimonial::findOrFail($id)->delete();
       return redirect()->route('testimonial.index')->with('trash-message',[__('manageTesti.systemMessages.deleted'), $id]);
     }

     public function forceDestroy($id)
     {
         $testimonial = Testimonial::withTrashed()->findOrFail($id);
         $testimonial->forceDelete();

         return redirect('/manage/testimonial?status=trash')->with('message',__('manageTesti.systemMessages.forceDelete'));
     }

     public function restore($id)
     {
         $testimonial = Testimonial::withTrashed()->findOrFail($id);
         $testimonial->restore();

         return redirect()->back()->with('message',__('manageTesti.systemMessages.restored'));
     }
     /**
     *
     * FUNCTION SECTION
     */

     private function statusList($request)
     {
       return [
         'own' => $request->user()->testimonial()->count(),
         'all' => Testimonial::count(),
         'published' => Testimonial::published()->count(),
         'scheduled' => Testimonial::scheduled()->count(),
         'draft' => Testimonial::draft()->count(),
         'trash' => Testimonial::onlyTrashed()->count()
       ];
     }

 }
