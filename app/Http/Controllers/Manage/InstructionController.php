<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Symfony\Component\HttpFoundation\File\UploadFile;
use App\Http\Requests\InstructionValidationRequest;
use App\Instruction;
use App\Lession;
use App\User;
use App\Category;
use App\Tag;
use App\Jobs\InstructionCreatedEmail;
use Intervention\Image\Facades\Image;

class InstructionController extends BackendController
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
        $instructions = Instruction::onlyTrashed()->with('author', 'category')->latest()->paginate($this->paginateLimit); //all();
        $instructionCount = Instruction::onlyTrashed()->count();
        $onlyTrashed = TRUE;
      }
      elseif ($status == 'published')
      {
        $instructions = Instruction::published()->with('author', 'category')->latest()->paginate($this->paginateLimit); //all();
        $instructionCount = Instruction::published()->count();

      }
      elseif ($status == 'scheduled')
      {
        $instructions = Instruction::scheduled()->with('author', 'category')->latest()->paginate($this->paginateLimit); //all();
        $instructionCount = Instruction::scheduled()->count();

      }
      elseif ($status == 'draft')
      {
        $instructions = Instruction::draft()->with('author', 'category')->latest()->paginate($this->paginateLimit); //all();
        $instructionCount = Instruction::draft()->count();

      }
      elseif ($status == 'own')
      {
        $instructions = $request->user()->instruction()->with('author', 'category')->latest()->paginate($this->paginateLimit); //all();
        $instructionCount = $request->user()->news()->count();

      }
      else
      {
        $instructions = Instruction::with('author', 'category')->latest()->paginate($this->paginateLimit); //all();
        $instructionCount = Instruction::count();

      }
      $statusList = $this->statuslist($request);
      return view('manage.instruction.index', compact('instructions', 'instructionCount', 'onlyTrashed', 'statusList'));//, ['users' => $users]);
    }

    public function create(Instruction $instruction)
    {
        $lessions = Lession::get();
        $tags = Tag::where('id', '<>', config('ownAttributes.default_tag.id'))->get();
        return view('manage.instruction.create',compact('instruction', 'tags', 'categories', 'lessions'));
    }

     public function store(InstructionValidationRequest $request)
     {
         $data = $this->handelRequest($request);

         $instruction = $request->user()->instruction()->create($data);

         $instruction->category()->sync($data['category_id']);
         if(!empty($data['tags']))
         {
           $instruction->tags()->sync($data['tags'], false);
         } else {
           $instruction->tags()->sync([config('ownAttributes.default_tag.id')]); //array()
         }
         if(!empty($data['lessions']))
         {
           $instruction->lessions()->sync($data['lessions']);
         } else {
           $instruction->lessions()->detach(); //array()
         }

         $job = (new InstructionCreatedEmail($instruction));
         //dispatch($job);
         
         return redirect()->route('instruction.index')->with('message',__('manageInstruction.systemMessages.created'));
     }

    public function show($id) { }

    public function edit($id)
    {
      $tags = Tag::where('id', '<>', config('ownAttributes.default_tag.id'))->get();
      $lessions = Lession::get();
      $instruction = Instruction::findOrFail($id);
// dd( $post->tags()->allRelatedIds() );
      return view('manage.instruction.edit', compact('instruction', 'tags', 'lessions'));//, ['users' => $users]);
    }

    public function update(InstructionValidationRequest $request, $id)
    {
        $instruction = Instruction::findOrFail($id);
        $oldImage = $instruction->image;
        $data = $this->handelRequest($request);
// dd($data);
        $instruction->category()->sync($data['category_id']);

        unset($data['slug']);
        $instruction->update($data);

        if( $oldImage !== $instruction->image)
        {
          $this->removeImage($oldImage);
        }
        if(!empty($data['tags']))
        {
          $instruction->tags()->sync($data['tags']);
        } else {
          $instruction->tags()->sync([config('ownAttributes.default_tag.id')]); //array()
        }
        if(!empty($data['lessions']))
        {
          $instruction->lessions()->sync($data['lessions']);
        } else {
          $instruction->lessions()->detach(); //array()
        }


        return redirect()->route('instruction.index')->with('message',__('manageInstruction.systemMessages.updated'));
    }

    public function destroy($id)
    {
      Instruction::findOrFail($id)->delete();
      return redirect()->route('instruction.index')->with('trash-message',[__('manageInstruction.systemMessages.deleted'), $id]);
    }

    public function forceDestroy($id)
    {
        $instruction = Instruction::withTrashed()->findOrFail($id);
        $instruction->forceDelete();
        $instruction->tags()->detach();
        $instruction->category()->detach();
        // $this->removeImage($instruction->image);

        return redirect('/manage/instruction?status=trash')->with('message',__('manageInstruction.systemMessages.forceDelete'));
    }

    public function restore($id)
    {
        $instruction = Instruction::withTrashed()->findOrFail($id);
        $instruction->restore();

        return redirect()->back()->with('message',__('manageInstruction.systemMessages.restored'));
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
        'own' => $request->user()->instruction()->count(),
        'all' => Instruction::count(),
        'published' => Instruction::published()->count(),
        'scheduled' => Instruction::scheduled()->count(),
        'draft' => Instruction::draft()->count(),
        'trash' => Instruction::onlyTrashed()->count()
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
