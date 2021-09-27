@extends('layouts.app')
@section('content')
    <div class="container">
        
    <div class="related mt-2" style="background-color:#888888;height:30px;width:120px;border-radius:25px">
                 <h6 style="padding:5px; font-style:oblique;color:chartreuse;text-align:center;">{{$tag->name}}</h6> 
            </div>
        <h4 class="inner mt-2" style="font-weight: bolder;">Potrebbero interessarti</h4>
        <div class="row">
           @foreach($tag->article as $article) 
            <div class="col-4 mt-2">
                <div class="card" style="width:20rem; height:30rem;">
                    <div class="card-body" style="line-height:15px;">
                        <h3>{{$article->title}}</h3>
                        <p class="card-text">{{$article->content}}</p>
                        <span class="write">Written by: {{$article->author->name}}</span> 
                    </div>
                </div>
            </div>
            @endforeach

        </div>           
   
      
                       
       
            
    </div>



@endsection