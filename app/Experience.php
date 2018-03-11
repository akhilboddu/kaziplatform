<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'experiences';
    public $primarykey = 'id'; //primary key
    public $timestamps = true; //timestamps

    protected $fillable = [
        'company_name', 'position', 'duration','link','description','cover_image','user_id',
    ];
}
