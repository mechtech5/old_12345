<!doctype html>
<html lang="en">
  <head>
    <title>AyushiBlogs | {{ $post->title }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('includes._wordify.head')
    <style>
      .embedded_image img{
        height: auto;
        max-width: 100%;
      }
      @media only screen and (max-width: 991px) {
        .sidebar {
          margin-top: 50px;
        }
      }
    </style>

  </head>

  <body>
    <div class="wrap" id="app">

      @include('includes._wordify.nav')
      <section class="site-section py-lg">
        <div class="container">
          
          <div class="row blog-entries element-animate">

            <div class="col-md-12 col-lg-8 main-content">
              <img src="{{ $post->featured_image }}" alt="Image" class="img-fluid mb-5">
               <div class="post-meta">
                <span class="author mr-2"><img src="{{ $author->avatar }}" alt="Colorlib" class="mr-2"> {{ $author->name }}</span>&bullet;
                <span class="mr-2">{{$post->publish_date->format('d F Y')}} </span> 
                {{-- &bullet;
                <span class="ml-2"><span class="fa fa-comments"></span> 3</span> --}}
              </div>
              <h1 class="mb-4">{{ $post->title }}</h1>
              @foreach($post->tags as $tag)
                <a class="category mb-5" href="#">{{ $tag->name }}</a> 
              @endforeach

              <div class="post-content-body">
                {!! $post->body !!}
              </div>

              @comments([
                  'model' => $post,
                  'approved' => true
              ])

              
              {{-- <div class="pt-5">
                <p>Categories:  <a href="#">Food</a>, <a href="#">Travel</a>  Tags: <a href="#">#manila</a>, <a href="#">#asia</a></p>
              </div> --}}
  
            </div>

            <!-- END main-content -->

            <div class="col-md-12 col-lg-4 sidebar">
                {{-- <div class="sidebar-box search-form-wrap">
                  <form action="#" class="search-form">
                    <div class="form-group">
                      <span class="icon fa fa-search"></span>
                      <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                    </div>
                  </form>
                </div> --}}
                <!-- END sidebar-box -->
                <div class="sidebar-box">
                  <div class="bio text-center">
                    <img src="{{ $author->avatar }}" alt="Image Placeholder" class="img-fluid">
                    <div class="bio-body">
                      <h2>{{ $author->name }}</h2>
                      <p>{!! $author->bio !!}</p>
                      <p><a href="#" class="btn btn-primary btn-sm rounded">Read my bio</a></p>
                      <p class="social">
                        <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                        <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                        <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                        <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                      </p>
                    </div>
                  </div>
                </div>
                <!-- END sidebar-box -->  
                {{-- <div class="sidebar-box">
                  <h3 class="heading">Popular Posts</h3>
                  <div class="post-entry-sidebar">
                    <ul>
                      @foreach($random_posts as $post)
                      <li>
                        <a href="">
                          <img src="{{ $post->featured_image }}" alt="Image placeholder" class="mr-4">
                          <div class="text">
                            <h4>{{ $post->title }}</h4>
                            <div class="post-meta">
                              <span class="mr-2">{{$post->publish_date->format('F d, Y')}} </span>
                            </div>
                          </div>
                        </a>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                </div> --}}
                <!-- END sidebar-box -->

                {{-- <div class="sidebar-box">
                  <h3 class="heading">Categories</h3>
                  <ul class="categories">
                    <li><a href="#">Food <span>(12)</span></a></li>
                    <li><a href="#">Travel <span>(22)</span></a></li>
                    <li><a href="#">Lifestyle <span>(37)</span></a></li>
                    <li><a href="#">Business <span>(42)</span></a></li>
                    <li><a href="#">Adventure <span>(14)</span></a></li>
                  </ul>
                </div> --}}
                <!-- END sidebar-box -->

                <div class="sidebar-box">
                  <h3 class="heading">Tags</h3>
                  <ul class="tags">
                    @foreach($tags as $tag)
                      <li><a href="#">{{ $tag->name }}</a></li>
                    @endforeach
                  </ul>
                </div>
              </div>
            <!-- END sidebar -->

          </div>
        </div>
      </section>

      {{-- <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="mb-3 ">Related Post</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4">
            <a href="#" class="a-block sm d-flex align-items-center height-md" style="background-image: url('images/img_2.jpg'); ">
              <div class="text">
                <div class="post-meta">
                  <span class="category">Lifestyle</span>
                  <span class="mr-2">March 15, 2018 </span> &bullet;
                  <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                </div>
                <h3>There’s a Cool New Way for Men to Wear Socks and Sandals</h3>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a href="#" class="a-block sm d-flex align-items-center height-md" style="background-image: url('images/img_3.jpg'); ">
              <div class="text">
                <div class="post-meta">
                  <span class="category">Travel</span>
                  <span class="mr-2">March 15, 2018 </span> &bullet;
                  <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                </div>
                <h3>There’s a Cool New Way for Men to Wear Socks and Sandals</h3>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4">
            <a href="#" class="a-block sm d-flex align-items-center height-md" style="background-image: url('images/img_4.jpg'); ">
              <div class="text">
                <div class="post-meta">
                  <span class="category">Food</span>
                  <span class="mr-2">March 15, 2018 </span> &bullet;
                  <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                </div>
                <h3>There’s a Cool New Way for Men to Wear Socks and Sandals</h3>
              </div>
            </a>
          </div>
        </div>
      </div>


      </section> --}}
      <!-- END section -->
  
      @include('includes._wordify.footer')
      <!-- END footer -->

    </div>
    
    @include('includes._wordify.scripts')
    <script>
      // $(document).ready(function(){

      // });
    </script>
  </body>
</html>