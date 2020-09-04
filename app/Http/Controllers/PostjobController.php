<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use \Auth;

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

       return redirect('/home')->with('success','The job was created successfully');
    }
}
