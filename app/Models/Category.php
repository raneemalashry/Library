<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
########################## Start Category_Books ##########################
public function books(){
        return $this->hasMany('App\Models\Book');
   }
########################## End Category_Books ##########################
}
