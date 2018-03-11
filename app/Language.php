<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';
    public $primarykey = 'id'; //primary key
    public $timestamps = true; //timestamps

    protected $fillable = [
        'user_id', 'language',
    ];
}
