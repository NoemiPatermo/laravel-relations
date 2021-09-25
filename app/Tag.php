<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function article() {
        return $this->belongsToMany(Article::class); //qui indichi la relazione many to many,  la FK va sulla tabella pivot
    }
}
