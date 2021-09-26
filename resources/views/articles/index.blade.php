@extends('layouts.app')

@section('content')

   <div class="container">
       
    <a href="{{ route('articles.create') }}" > <!--ti manda alla create per creare un nuovo elemento-->
        <button type="button" class="btn btn-primary">Add new</button>
    </a>
        <div class="row mt-2">
           @foreach($articles as $article)
              <div class=" box col-4 mt-2">
                    <div class="card" style="width:18rem;height:60rem;">
                       <img class="card-img-top" src="{{$article->cover}}" alt="Card image cap">
                       <div class="card-body">
                            <h5 class="card-title">{{$article->title}}</h5>
                            <p class="card-text">{{$article->content}}</p>
                        </div>
                        <div class="card-footer">
                    <a href="{{ route('articles.show', $article->id)}}" class="btn btn-success btn-md" role="button" aria-pressed="true">Learn more</a>
                </div>
                    </div>
              </div>
           @endforeach
        </div>
      
        
            
       
   </div>
 
@endsection