<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function scopeChoixReponse($query, $id) {
        return $query->where('id', $id);
    }//
}
