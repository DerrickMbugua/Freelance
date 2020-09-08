<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use \Auth;
use Session;

class PostjobController extends Controller
{
    //
    public function index(Request $req){
       // echo "Hello";
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
    public function list(){
        $User=Auth::user();
        $Jobs=$User->jobs->all();
//return Job::all();
        return view('jobs',["Jobs"=>$Jobs]);
    }

    public function delete($id){
        Job::find($id)->delete();
        Session::flash('status','The Job has been deleted successfully');
       return redirect('/jobs');
    }

    public function edit($id){
        $edit= Job::find($id);
        return view('editjob',['edit'=>$edit]);
    }

    public function update(Request $req)
    {
        //return $req->input();
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
}
