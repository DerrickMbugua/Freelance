<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proposal;
use App\Profile;
use \Auth;

class ProposalController extends Controller
{
    //create proposal
    public function index(Request $req){
        //return $req->input();
        $proposal=new Proposal;
        $proposal->job_id=$req->job_id;
        $proposal->proposal_text=$req->proposal_text;
        $proposal->bid=$req->bid;
        $proposal->delivery_date=$req->delivery_date;
        $User = Auth::user();
       $User->proposals()->save($proposal);
       $req->session()->flash('status','Proposal sent');

       return redirect('/findjob');
    }
//show the number of proposal in the client side
    public function list($id){
        $list=Proposal::find($id)->where('job_id',$id)->get();
       //$profile=Profile::find($userid)->get();
       return view('proposal')->with('list',$list);
    }
    
}
