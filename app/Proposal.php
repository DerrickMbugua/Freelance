<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    //user relationship
    public function user(){
        return $this->belongsTo('App\User');
    }
    //job relationship
    public function job(){
        return $this->belongsTo('App\Job');
    }
}
