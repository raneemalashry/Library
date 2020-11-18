<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
########################## Start Comments_Book ##########################
    public function book(){
        return $this->belongsTo('App\Models\book');
    }
########################## End Comments_Book ##########################
########################## Start Comment_user ##########################
public function user(){
    return $this->belongsTo('App\User');
}
########################## End Comments_User ##########################
}
