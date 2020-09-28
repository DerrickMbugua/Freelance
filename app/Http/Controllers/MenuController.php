<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class MenuController extends Controller
{
    //
    public function getUserMenu(){
        $Menu=array();

        $User=Auth::user();

        if(!is_null($User)){
            $Menu['/home']='Dashboard';

            if($User->hasRole('Client')){
$Menu['/postjob']='Post a New Job';
$Menu['/jobs']='My Jobs';
            }

            if($User->hasRole('Freelancer')){
$Menu['/findjob']='Find a Job';
$Menu['/profile']='Profile';
            }
        }

        return $Menu;
    }
}
