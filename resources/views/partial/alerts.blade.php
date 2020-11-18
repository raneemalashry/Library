@if (session('msg'))
<div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>
   {{session('msg')}}
  </div>
@endif

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >&times;</button>
   <strong>Errors</strong>
    @foreach ($errors ->all() as $error)
    {{$error}}</br>
    @endforeach
   
  </div>
  @endif