<?php
namespace App\Http\Controllers\Manage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Session;
use Auth;
use App\Jobs\OpenDayContactEmail;

use Carbon\Carbon;

class JobController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $onlyTrashed = FALSE;
      // \DB::enableQueryLog();
      $numJobs = DB::table('jobs')->where('queue','OpenDayContactSended')->get();
      $jobsCount = $numJobs->count();
      $jobs = [];
      // dd($jobs);
      //Ha van elem
      if($jobsCount){
        foreach($numJobs as $k => $v)
        {
          $resultArray[] = $v;
        }
        // dd($jobs);
        // array:3 [▼
        //   0 => {#526 ▼
          //   +"id": 113
          //   +"queue": "OpenDayContactSended"
          //   +"payload": "{"displayName":"App\\Jobs\\OpenDayContactEmail","job":"Illuminate\\Queue\\CallQueuedHandler@call","maxTries":null,"timeout":null,"data":{"commandName":"App\\Job ▶"
          //   +"attempts": 0
          //   +"reserved_at": null
          //   +"available_at": 1516481019
          //   +"created_at": 1516481019
          // }
        //   1 => {#518 ▶}
        //   2 => {#524 ▶}
        // ]

        // $jobs = [];
        foreach($resultArray as $k => $v)
        {
          // dd((array)$v);

          $tmpJob = (array)$v;
          $tmpJob['created_at'] = Carbon::createFromTimestamp($tmpJob['created_at'])->toDateTimeString();
          $vv = unserialize(json_decode($tmpJob['payload'])->data->command);
          $tmp = (array)$vv;
          // dd($tmp);
          foreach($tmp as $k=>$v){
            $tmp2[] = $v;
          }
          // dd($tmpJob);
          $tmpJob['payload'] = $tmp2[0];
          $jobs[] = $tmpJob;
        // dd($tmpJob);
        }
        // dd($jobs);
        return view('manage.jobs.index',compact('jobs','jobsCount','onlyTrashed'));
      }

      return view('manage.jobs.index',compact('jobs','jobsCount','onlyTrashed'));


    }
}
