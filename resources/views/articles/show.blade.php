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
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ $article->cover }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->content}}</p> 
                            <p>AUTORE: {{ $article->author->name }}</p>
                       
                        </div>
                    </div>
        </div>

@endsection