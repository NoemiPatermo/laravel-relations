@extends('layouts.app')

@section('content')

   <div class="container">
       @foreach($articles as $article)
        <div class="card-group mt-3">
            <div class="card">
                <img class="card-img-top" src="{{$article->cover}}" alt="Card image cap">
               <div class="card-body">
                  <h5 class="card-title">{{$article->title}}</h5>
                  <p class="card-text">{{$article->content}}</p>
                </div>
                <div class="card-footer">
                    <span class="text-muted">{{$article->author->name}}</span>
                </div>
            </div>
        @endforeach
   </div>
 
@endsection