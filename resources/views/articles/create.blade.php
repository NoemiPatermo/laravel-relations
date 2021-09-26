@extends('layouts.app')

@section('content')

        <div class="container">
        
                 @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div style="text-align: center;font-weight:bolder;font-style:oblique;" mb-2>
                        <h3>Aggiungi un nuovo articolo</h3>
                </div>


                <form action="{{ route ('articles.store') }}" method="POST"> <!--INDICHI LA ROTTA NEL MOMENTO IN CUI AVVIENE IL SUBMIT -->
                        @csrf
                            <div class="row  justify-content-center mt-4">
                            
                                <div class="form-group col-8">

                                    <div class="form-group">
                                        <label for="title" >Title</label>
                                        <input type="text" class="form-control"  name="title" id="title">
                                    
                                    </div>

                                      <!-- invia alla create una lista di tags e per ognuno stampi stampa una checkbox-->
                                        <strong>Tag</strong>
                                        <div class="form-group">
                                            @foreach($tags as $tag) <!--tags[] è array di id tag, che arriva alla store come array ovviamente, esegui poi  l'attach solo dei tag ricevuti-->
                                            <div class="chip">
                                                <input name="tags[]" type="checkbox" value="{{ $tag->id }}">
                                                <label class="chip-label">{{$tag->name}}</label>
                                            </div>
                                            @endforeach

                                        </div>

                                        <div class="form-group">
                                            <label for="cover ">Cover</label>
                                            <input type="text" class="form-control" name="cover" id="cover">
                                        </div>


                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <label class="input-group-text" for="author_id">Options</label>
                                                </div>
                                                <select class="custom-select" id="author_id" name="author_id">
                                                    <option selected>Choose Author</option>
                                                    @foreach($authors as $author)
                                                        <option value="{{$author->id}}">{{ $author->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                
                                            <div class="form-group">
                                                <label for="date">Content</label>
                                                <textarea  class="form-control" name="content" id="date"></textarea>
                                            </div>
                                                    
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </div> 
                             </div>             
                </form>
        </div>

@endsection