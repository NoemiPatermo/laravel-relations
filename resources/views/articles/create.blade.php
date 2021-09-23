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
                <h3>Aggiungi un nuovo post</h3>
        </div>


        <form action="{{ route ('articles.store') }}" method="POST"> <!--INDICHI LA ROTTA NEL MOMENTO IN CUI AVVIENE IL SUBMIT -->
                @csrf
                    <div class="row  justify-content-center mt-4">
                    
                        <div class="form-group col-8">
                              <div class="form-group"  >
                                 <label for="title" >Title</label>
                                 <input type="text" class="form-control"  name="title" id="title">
                            
                              </div>

                            
                              <div class="form-group"  >
                                <label for="cover ">Cover</label>
                                <input type="text" class="form-control" name="cover" id="cover">
                              </div>
                        
                              <div class="form-group">
                                <label for="cover ">Author</label>
                                <input type="text" class="form-control" name="author" id="author">
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