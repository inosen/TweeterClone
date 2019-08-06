<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Visit extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
}
