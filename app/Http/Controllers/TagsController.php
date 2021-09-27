<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    public function list() {  //qui hai la lista di tag
            $tags = Tag::all();
            return view('tags');
    }

    public function show(Tag $tag) {

        return view('tags.show', compact('tag'));
    }
}
