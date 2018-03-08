<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    protected $table = 'clusters';
    public $primarykey = 'id'; //primary key
    public $timestamps = true; //timestamps

    protected $fillable = [
        'slogan'
    ];

    //creates a relationship 
    public function users(){
    	return $this->hasMany('\App\User');
    }
}
