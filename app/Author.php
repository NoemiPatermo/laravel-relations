<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{   

    public function authorInfo() { //relazione ONE TO ONE
        return $this->hasOne(AuthorInfo::class);
    }

    public function article() {
        return $this->hasMany(Article::class); // NON HA LA FK
    }
}
