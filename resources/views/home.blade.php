@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>



   <div class="container">
       
    <a href="{{ route('articles.create') }}" > <!--ti manda alla create per creare un nuovo elemento-->
        <button type="button" class="btn btn-primary">Add new</button>
    </a>

       @foreach($allArticles as $article)
        <div class="card-group mt-3">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{$article->cover}}" alt="Card image cap">
               <div class="card-body">
                  <h5 class="card-title">{{$article->title}}</h5>
                  <p class="card-text">{{$article->content}}</p>
                </div>
                <div class="card-footer">
                    <span class="text-muted">{{$article->author->name}}</span>
                    <a href="{{ route('articles.show', $article->id)}}" class="btn btn-success btn-md" role="button" aria-pressed="true">Learn more</a>
                </div>
            </div>
        @endforeach
   </div>
 
@endsection

