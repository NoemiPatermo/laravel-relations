<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function author() {
        return $this->belongsTo(Author::class); // QUI HAI LA FK [1 autore -> many articoli]
    }
}
