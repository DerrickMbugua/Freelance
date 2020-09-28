<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    
    //user relationship
    public function user(){
        return $this->belongsTo('App\User');
    }
    //proposal relationship
    public function proposal(){
        return $this->hasMany('App\Proposal','job_id');
    }
        
    
}
