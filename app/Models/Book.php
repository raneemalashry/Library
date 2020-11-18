<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
########################## Start book_user ##########################
public function user(){
    return $this->belongsTo('App\User');
}
########################## End book_user ##########################

########################## Start book_category ##########################
   public function category(){
    return $this->belongsTo('App\Models\Category');
}
########################## End book_category ##########################

########################## Start book_comments ##########################
public function comments(){
    return $this->hasMany('App\Models\Comment');
}
########################## End book_comments ##########################
}
