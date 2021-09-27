@extends('layouts.app')

@section('content')
     
        <div class="show container">
            <a href="{{ route('articles.index')}}" class="btn btn-info btn-md" role="button" aria-pressed="true">Torna agli articoli</a>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                           
                                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                        </div>
                                    @endif    
                                </div>
                            
                        </div>
                    </div>             
                    <div class="card">
                        <img class="card-img-top" src="{{ $article->cover }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->content}}</p> 
                            <span class="write">Written by: {{ $article->author->name }}</span>
                          
                                @foreach($article->tag as $tag)
                                <div class="chip chip-label"> <!--chip che non funzionano -->
                                  <span class="chip-label"><a href="{{ route('tag-show', $tag) }}">{{$tag->name}}</a></span>
                                </div>
                                @endforeach
                           
                        </div>
                    </div>
        </div>

@endsection