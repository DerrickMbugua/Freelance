<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Proposal;
use \Auth;
use Session;

class PostjobController extends Controller
{
    //store jobs
    public function index(Request $req){
       $job=new Job;
       $job->title=$req->title;
       $job->description=$req->description;
       $job->budget=$req->budget;
       $job->delivery_date=$req->delivery_date;
       $job->hired_at=$req->hired_at;
       $path=$req->file('doc')->store('files');

       $User = Auth::user();
       $User->jobs()->save($job);
       $req->session()->flash('status','The Job has been created successfully');

       return redirect('/jobs');
    }
    //list jobs
    public function list(){
        $User=Auth::user();
        $Jobs=$User->jobs->all();
        $prop=Proposal::all();
        return view('jobs')->with('Jobs',$Jobs)->with('prop',$prop);
    }
//delete jobs
    public function delete($id){
        Job::find($id)->delete();
        Session::flash('status','The Job has been deleted successfully');
       return redirect('/jobs');
    }
//edit jobs
    public function edit($id){
        $edit= Job::find($id);
        return view('editjob',['edit'=>$edit]);
    }
//update jobs
    public function update(Request $req)
    {
        $job=Job::find($req->id);
       $job->title=$req->title;
     $job->description=$req->description;
        $job->budget=$req->budget;
      $job->delivery_date=$req->delivery_date;
        $job->hired_at=$req->hired_at;
        $path=$req->file('doc')->store('files');
 
      $User = Auth::user();
      $User->jobs()->save($job);
        $req->session()->flash('status','The Job has been updated successfully');
 
        return redirect('/jobs');
    }

    public function show(){
    // $User=Auth::user();
   // $vacanies=$User->jobs->all();
//return Job::all();
$vacanies=Job::all();
    return view('findjob',["vacanies"=>$vacanies]);
  }

  public function apply($id){
    $apply= Job::find($id);
    return view('applyjob',['apply'=>$apply]);
}



}
