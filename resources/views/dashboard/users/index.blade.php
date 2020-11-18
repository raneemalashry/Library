@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title" >Users 
        <a href="#" class="btn btn-outline-dark btn-sm active float-right" role="button" aria-pressed="true">New User</a>
      </h3>
      
   </div>
    <!-- /.box-header -->
    <div class="box-body">
      @if (count($users)>0)
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">E-mail</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
              </tr>
            </thead>
          
            <tbody>
                @foreach ($users as $index=>$user)
                    
                
              <tr>
                <th scope="row">{{ $index + 1 }}</th>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>{{$user->created_at}}</td>
              <td>{{$user->updated_at}}</td>
              </tr>
              @endforeach
              
            </tbody>
           
             
           
               
          </table>
              
          @else
          <h4> No Categories Found </h4>
          @endif
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

