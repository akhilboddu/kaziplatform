<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $table = 'requests';
    public $primarykey = 'id'; //primary key
    public $timestamps = true; //timestamps
}
