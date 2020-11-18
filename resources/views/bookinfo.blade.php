@extends('layouts.app')

@section('content')
<div class="row">
       
            <div class="card">
                <div class="card-header"><strong> {{$book->name}} </strong></div>

             
             <div class="card-body">
                <div class="row">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="col-lg-4 col-md-6 mb-4">
                   
                    <div class="card h-100">
                        <img class="card-img-top" src="{{asset('storage/thumbnails/'.$book->image)}}" alt="First slide">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                   <div class="card-body">
                        <h4 class="card-title">
                          <a href="#">{{$book->title}}</a>
                        </h4>
                        Author:<h5>{{$book->author}}</h5>
                        <p class="card-text">{{$book->info}}</p>
                        <small>Uploaded By: {{$book->user->name}}</small></br>
                        <small>Category: {{$book->category->name}}</small>
                      </div>
                      <div class="card">
                      <a href="{{asset('storage/books/'.$book->book)}}" class=" btn btn-outline-dark btn-sm active">Donwload</a>
                      </div>
                    </div>
                  </div>
                </div>
                
            <div class="card">
              <div class="card-header"><strong> Comments </strong></div>
              @if (count($book->comments)>0)
              @foreach ($book->comments as $comment)
              <div class="card-body">
                <h4 class="card-title">
                  <h5>{{$comment->user->name}}</h5>
                  <h6 class="card-text"><small>{{$comment->comment}}<small></h6>
                    <small>{{$comment->created_at}}</small>
                </h4>
                  
              </div>
              @endforeach
             
              @endif
             
          </div>

                @if (Auth::user())   <!-- /.row -->
                @include('commentcreate')
                @endif
                </div>
            </div>
 
@endsection
