<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Symfony\Component\HttpFoundation\File\UploadFile;
use App\Http\Requests\LessionValidationRequest;
use App\Instruction;
use App\Lession;
use App\User;
use App\Category;
use App\Tag;
use App\Jobs\LessionCreatedEmail;
use Intervention\Image\Facades\Image;

class LessionController extends BackendController
{

  protected $paginateLimit = 10;
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
         $lessions = Lession::onlyTrashed()->with('author', 'category')->latest()->paginate($this->paginateLimit); //all();
         $lessionCount = Lession::onlyTrashed()->count();
         $onlyTrashed = TRUE;
       }
       elseif ($status == 'published')
       {
         $lessions = Lession::published()->with('author', 'category')->latest()->paginate($this->paginateLimit); //all();
         $lessionCount = Lession::published()->count();

       }
       elseif ($status == 'scheduled')
       {
         $lessions = Lession::scheduled()->with('author', 'category')->latest()->paginate($this->paginateLimit); //all();
         $lessionCount = Lession::scheduled()->count();

       }
       elseif ($status == 'draft')
       {
         $lessions = Lession::draft()->with('author', 'category')->latest()->paginate($this->paginateLimit); //all();
         $lessionCount = Lession::draft()->count();

       }
       elseif ($status == 'own')
       {
         $lessions = $request->user()->lession()->with('author', 'category')->latest()->paginate($this->paginateLimit); //all();
         $lessionCount = $request->user()->news()->count();

       }
       else
       {
         $lessions = Lession::with('author', 'category')->latest()->paginate($this->paginateLimit); //all();
         $lessionCount = Lession::count();

       }
       $statusList = $this->statuslist($request);
       return view('manage.lession.index', compact('lessions', 'lessionCount', 'onlyTrashed', 'statusList'));//, ['users' => $users]);
     }


     public function create(Lession $lession)
     {
         $tags = Tag::where('id', '<>', config('ownAttributes.default_tag.id'))->get();
         return view('manage.lession.create',compact('lession', 'tags', 'categories'));
     }

      public function store(LessionValidationRequest $request)
      {
          $data = $this->handelRequest($request);

          $lession = $request->user()->lession()->create($data);

          $lession->category()->sync($data['category_id']);
          if(!empty($data['tags']))
          {
            $lession->tags()->sync($data['tags'], false);
          } else {
            $lession->tags()->sync([config('ownAttributes.default_tag.id')]); //array()
          }

          $job = (new LessionCreatedEmail($lession));
          //dispatch($job);

          return redirect()->route('lession.index')->with('message',__('manageLession.systemMessages.created'));
      }


     public function show($id) { }

     public function edit($id)
     {
       $tags = Tag::where('id', '<>', config('ownAttributes.default_tag.id'))->get();
       $lession = Lession::findOrFail($id);
 // dd( $post->tags()->allRelatedIds() );
       return view('manage.lession.edit', compact('lession', 'tags'));//, ['users' => $users]);
     }

     public function update(LessionValidationRequest $request, $id)
     {
         $lession = Lession::findOrFail($id);
         $oldImage = $lession->image;
         $data = $this->handelRequest($request);

         $lession->category()->sync($data['category_id']);
 // dd($data);

        unset($data['slug']);
         $lession->update($data);

         if( $oldImage !== $lession->image)
         {
           $this->removeImage($oldImage);
         }
         if(!empty($data['tags']))
         {
           $lession->tags()->sync($data['tags']);
         } else {
           $lession->tags()->sync([config('ownAttributes.default_tag.id')]); //array()
         }


         return redirect()->route('lession.index')->with('message',__('manageLession.systemMessages.updated'));
     }

     public function destroy($id)
     {
       Lession::findOrFail($id)->delete();
       return redirect()->route('lession.index')->with('trash-message',[__('manageLession.systemMessages.deleted'), $id]);
     }

     public function forceDestroy($id)
     {
         $lession = Lession::withTrashed()->findOrFail($id);
         $lession->forceDelete();
         $lession->tags()->detach();
         $lession->category()->detach();
         // $this->removeImage($lession->image);

         return redirect('/manage/lession?status=trash')->with('message',__('manageLession.systemMessages.forceDelete'));
     }

     public function restore($id)
     {
         $lession = Lession::withTrashed()->findOrFail($id);
         $lession->restore();

         return redirect()->back()->with('message',__('manageLession.systemMessages.restored'));
     }
     /**
     *
     * FUNCTION SECTION
     */

     public function handelRequest($request)
     {
         $data = $request->all();
         if($request['published_at'] <> NULL) $request['is_published'] = '1';

         if($request->hasFile('image'))
         {
           $image = $request->file('image');
           // dd($image);
           $fileName = $image->getClientOriginalName();
           $extension = $image->getClientOriginalExtension();

           $destination = $this->uploadPath;

           $successUpload = $image->move($destination, $fileName);
           if($successUpload)
           {
             $thumbWidth = config('imageAttributes.image.news.thumbnail.width');
             $thumbHeight = config('imageAttributes.image.news.thumbnail.height');
             $width = config('imageAttributes.image.news.width');
             $height = config('imageAttributes.image.news.height');
             $thumbnail = str_replace(".{$extension}","_thumb.{$extension}", $fileName);
             Image::make($destination . "/" . $fileName)->resize($thumbWidth,$thumbHeight)->save($destination . "/" . $thumbnail);
             Image::make($destination . "/" . $fileName)->resize($width,$height)->save($destination . "/" . $fileName);
           }

           $data['image'] = $fileName;

         }

         return $data;
     }

     private function statusList($request)
     {
       return [
         'own' => $request->user()->lession()->count(),
         'all' => Lession::count(),
         'published' => Lession::published()->count(),
         'scheduled' => Lession::scheduled()->count(),
         'draft' => Lession::draft()->count(),
         'trash' => Lession::onlyTrashed()->count()
       ];
     }

     public function removeImage($image)
     {
       if ( ! empty($image))
       {
         $imagePath = $this->uploadPath. '/' . $image;
         $ext = pathinfo($image, PATHINFO_EXTENSION);
         $thumbnail = pathinfo($image, PATHINFO_FILENAME)."_thumb.".$ext;
         $thumbnailPath = $this->uploadPath. '/' . $thumbnail;
 //dd($thumbnailPath);
         if( file_exists($imagePath)) unlink($imagePath);
         if( file_exists($thumbnailPath)) unlink($thumbnailPath);
       }
     }
 }
