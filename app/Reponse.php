<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    protected $fillable = [
    	'question_id',
    	'reponse',
    	'user_link'
    ];
}
