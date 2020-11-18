<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

<title>Librariannn</title>

  <!-- Bootstrap core CSS -->
  <link href='{{asset("vendor/temp/bootstrap/css/bootstrap.min.css")}}' rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href='{{asset("css/temp/shop-homepage.css")}}' rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Librariannn</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
            <a class="nav-link" href="{{route('welcome')}}">All Books</a>
                  </li>
            @guest
           
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
        @if (Auth::user()->hasAnyRole('admins'))
        <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}">Dashboard</a>
          </li>
    @endif

       
        <li class="nav-item">
            <a class="nav-link" href="{{route('book.create')}}">Upload New Book</a>
              </li>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
            
        @endguest
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">All Categories</h1>
        @if (count($allcategories))
        <div class="list-group">
            @foreach ($allcategories as $category)
        <a href="{{route('category.books',$category->id)}}" class="list-group-item">{{$category->name}}</a>
            @endforeach
          
           
          </div>
        @endif
      

      </div>
      <div class="col-lg-9">
            @yield('content')
      </div>
</div>
<!-- /.row -->

</div>
<!-- /.container -->



  <!-- Bootstrap core JavaScript -->
  <script src='{{asset("vendor/temp/jquery/jquery.min.js")}}'></script>
  <script src='{{asset("vendor/temp/bootstrap/js/bootstrap.bundle.min.js")}}'></script>

</body>

</html>
