<header role="banner">
  <div class="top-bar">
    <div class="container">
      <div class="row">
        <div class="col-6 social">
          <a href="#"><span class="fa fa-twitter"></span></a>
          <a href="#"><span class="fa fa-facebook"></span></a>
          <a href="#"><span class="fa fa-instagram"></span></a>
          <a href="#"><span class="fa fa-youtube-play"></span></a>
        </div>
        <div class="col-6">
          <!-- <a href="#"><span class="fa fa-search"></span></a> -->
          {{-- <form action="#" class="search-top-form">
            <span class="icon fa fa-search"></span>
            <input type="text" id="s" placeholder="Type keyword to search...">
          </form> --}}
          <span class="float-right">
            @guest
                <a class="text-white" href="{{ route('login') }}">{{ __('Login') }} | </a>
                @if (Route::has('register'))
                  <a class="text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif  
            @else
                <a class="text-white"> 
                    {{ Auth::user()->username }} <span class="caret"></span> | 
                </a>
                <a class="text-black" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
          </span>  
        </div>
      </div>
    </div>
  </div>

  <div class="container logo-wrap">
    <div class="row pt-5">
      <div class="col-12 text-center">
        <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
        <h1 class="site-logo"><a href="{{ url('/') }}">Ayushiblogs</a></h1>
      </div>
    </div>
  </div>
  
  <nav class="navbar navbar-expand-md  navbar-light bg-light">
    <div class="container">
      
     
      <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('ayushiblogs.index') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Network</a>
          </li>
          {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="category.html" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Travel</a>
            <div class="dropdown-menu" aria-labelledby="dropdown04">
              <a class="dropdown-item" href="category.html">Asia</a>
              <a class="dropdown-item" href="category.html">Europe</a>
              <a class="dropdown-item" href="category.html">Dubai</a>
              <a class="dropdown-item" href="category.html">Africa</a>
              <a class="dropdown-item" href="category.html">South America</a>
            </div>

          </li> --}}

          {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="category.html" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
            <div class="dropdown-menu" aria-labelledby="dropdown05">
              <a class="dropdown-item" href="category.html">Lifestyle</a>
              <a class="dropdown-item" href="category.html">Food</a>
              <a class="dropdown-item" href="category.html">Adventure</a>
              <a class="dropdown-item" href="category.html">Travel</a>
              <a class="dropdown-item" href="category.html">Business</a>
            </div>

          </li> --}}
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
        
      </div>
    </div>
  </nav>
</header>