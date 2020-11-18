@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title" >Create New Category 
      <a href="{{route('categories.index')}}" class="btn btn-outline-dark btn-sm active float-right" role="button" aria-pressed="true">All Categories</a>
      </h3>
      
   </div>
    <!-- /.box-header -->
    <div class="box-body" >
        <form action='{{route('categories.store')}}' method='Post'>
            @csrf
        <div class="form-group" >
           
              <label>Category Name</label>
              <input type="text" class="form-control" name="name" placeholder="Name Of The Category">
            
            </div>
            <input type="submit"value='Save' class=" form-control btn btn-outline-dark btn-sm active">
          </form>
    </div>

  </div>
  <!-- /.box -->
@stop
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

