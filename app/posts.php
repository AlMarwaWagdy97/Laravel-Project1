<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // to use sof delete

class posts extends Model
{
    // to use soft delete
    use SoftDeletes;
    
    protected $fillable =['title', 'content', 'user_id'];
    protected $date = ['delete_at'];

    //functionss//////////////////////////////////////
    public function user_id(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function user(){
        return $this->hasOne('App\User', 'id', 'user_id');
    }

      
}
