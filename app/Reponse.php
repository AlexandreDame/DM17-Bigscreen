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

    

	// return responses when user_link === $userLink

    public function scopeUserLink($query, $userLink)
    {
        return $query->where('user_link', $userLink);
    }

   public function scopeId_question($query, $id) {
        // return responses where the question_id is equal to the $id
        return $query->where('question_id', $id);
    }
}
