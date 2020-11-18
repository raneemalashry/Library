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
    ########################## Start User_Books ##########################
    public function books(){
         return $this->hasMany('App\Models\Book');
    }
    ##########################  End User_Books ##########################

    ##########################  start User_Comments ##########################
    public function comments(){
        return $this->hasMany('App\Models\Comment');
   }
   ##########################  End User_Comments ##########################
   
   ########################## Start User_Roles ##########################
   public function roles(){
    return $this->belongsToMany('App\Models\Role','roles_users','user_id','role_id');
    }
     ########################## End User_Roles ##########################
    public function hasAnyRole($roles){
    if(is_array($roles)){
        foreach($roles as $role){
            if($this->hasRole($role)){
                return true;
            }

        }

    }
    else{
        if($this->hasRole($roles)){
            return true;
        }

    }
    return false;


    }
    public function hasRole($role){
        if($this->roles()->where('name',$role)->first()){
            return true ;
        }
        return false ;
    }

}