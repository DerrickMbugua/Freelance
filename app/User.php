<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Role relationship
    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function hasRole($Role){
        return null !== $this->role()->where('name',$Role)->first();
    }

    //Job relationship
    public function jobs(){
        return $this->hasMany('App\Job','user_id');
    }

    //Proposal Relationship
    public function proposals(){
        return $this->hasMany('App\Proposal','user_id');
    }

    //profile
    public function profile(){
        return $this->hasOne('App\Profile');
    }
}
