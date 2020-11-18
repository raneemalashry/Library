@extends('layouts.app')

@section('content')
<div class="row">
       
            <div class="card">
                <div class="card-header"><strong> Latest Books </strong></div>

             
             <div class="card-body">
                <div class="row">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if (count($books)>0)
                @foreach ($books as $book)
                <div class="col-lg-4 col-md-6 mb-4">
                   
                    <div class="card h-100">
                      <a href="#"><img class="card-img-top" src="{{asset('storage/thumbnails/'.$book->image)}}" alt=""></a>
                      <div class="card-body">
                        <h4 class="card-title">
                          <a href="#">{{$book->title}}</a>
                        </h4>
                        Author:<h5>{{$book->author}}</h5>
                        <p class="card-text">{{$book->info}}</p>
                      </div>
                      <div class="card-footer">
                      <a href="{{asset('storage/books/'.$book->book)}}" class=" btn btn-outline-dark btn-sm active">Donwload</a>
                      <a href="{{route('book.info',$book->id)}}" class=" btn btn-info btn-sm active">More Info</a>
                      </div>
                    </div>
                  </div>
               
                
                @endforeach
             @endif
            </div>
                    <!-- /.row -->
            {{$books->links()}}
                
                </div>
            </div>
 
@endsection
