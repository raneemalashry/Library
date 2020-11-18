@extends('layouts.app')

@section('content')

       
            <div class="card">
                <div class="card-header"><strong> Upload New Book </strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('partial.alerts')
                    <form action="{{route('book.upload')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                          <label>Book Title</label>
                          <input type="text" class="form-control"  name="title" placeholder="Enter The Title">     
                        </div>
                        <div class="form-group">
                            <label> Author</label>
                            <input type="text" class="form-control"  name="author" placeholder="Enter The Author">     
                          </div>
                          <div class="form-group">
                            <label> Description</label>
                           <textarea name="info" class="form-control" ></textarea>     
                          </div>
                          <div class="form-group ">
                            <label>Category</label>
                            <select  name='category' class="form-control">
                                @if (count($allcategories)>0)
                                @foreach ($allcategories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                                @endif
                             </select>
                          </div>
                         <div class="form-group">
                            <label>Upload Book Image</label>
                            <input type="file" class="form-control-file" name="image">
                          </div>
                          <div class="form-group">
                            <label>Upload Book Pdf</label>
                            <input type="file" class="form-control-file" name="book">
                          </div>
                        <input type="submit" class=" form-control btn btn-outline-dark btn-sm active" value="Upload">
                      </form>
                </div>
            </div>
 
@endsection
