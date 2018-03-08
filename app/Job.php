<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';
    public $primarykey = 'id'; //primary key
    public $timestamps = true; //timestamps

    //creates a relationship 
    public function client(){
    	return $this->belongsTo('\App\Client');
    }

    public function applications(){
    	return $this->hasMany('\App\Application');
    }

}
