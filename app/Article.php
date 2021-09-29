<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{   
    public function comment(){
        return $this->hasMany(Comment::class);
    }

    public function author() {
        return $this->belongsTo(Author::class); // QUI HAI LA FK [1 autore -> many articoli]
    }

    public function tag() {
        return $this->belongsToMany(Tag::class); //relazione many to many
    }
}
