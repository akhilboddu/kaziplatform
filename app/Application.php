<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'applications';
    public $primarykey = 'id'; //primary key
    public $timestamps = true; //timestamps

    public function job(){
    	return $this->belongsTo('\App\Job');
    }
}
