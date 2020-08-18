<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //user relationship
    public function myuser(){
        return $this->belongsTo(App\User);
    }
}
