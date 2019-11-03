<!doctype html>
<html lang="en">
  <head>
    <title></title>
    
    @include('partials._wordify.head')
    
  </head>

  <body>
    <div class="wrap">

      @include('partials._wordify.nav')
      <!-- END header -->

      <section class="site-section pt-5 pb-5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <div class="owl-carousel owl-theme home-slider">
                @foreach($random_posts as $post)
                <div>
                  <a href="{{ route('ayushiblogs.show', $post->slug) }}" class="a-block d-flex align-items-center height-lg" style="background-image: url('{{ $post->featured_image }}'); ">
                    <div class="text half-to-full">
                      @foreach($post->tags as $tag)
                        <span class="category mb-5">{{$tag->name}}</span>
                      @endforeach  
                      <div class="post-meta">
                        
                        {{-- <span class="author mr-2"><img src="images/person_1.jpg" alt="Colorlib"> Colorlib</span>&bullet; --}}
                        <span class="mr-2">{{$post->publish_date->format('F d, Y')}} </span> 
                        {{-- &bullet; --}}
                        {{-- <span class="ml-2"><span class="fa fa-comments"></span> 3</span> --}}
                        
                      </div>
                      <h3>{{$post->title}}</h3>
                      <p>{{$post->excerpt}}</p>
                    </div>
                  </a>
                </div>
                @endforeach
              </div>
              
            </div>
          </div>
          
        </div>


      </section>
      <!-- END section -->

      <section class="site-section py-sm">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h2 class="mb-4">Latest Posts</h2>
            </div>
          </div>
          <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
              <div class="row">
                @foreach($posts as $post)
                <div class="col-md-6">
                  <a href="{{ route('ayushiblogs.show', $post->slug) }}" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <img src="{{$post->featured_image}}" alt="Image placeholder">
                    <div class="blog-content-body">
                      <div class="post-meta">
                        {{-- <span class="author mr-2"><img src="" alt="Colorlib"> Colorlib</span>&bullet; --}}
                        <span class="mr-2">{{$post->publish_date->format('d F Y')}}</span> 
                        {{-- &bullet; --}}
                        {{-- <span class="ml-2"><span class="fa fa-comments"></span> 3</span> --}}
                      </div>
                      <h2>{{$post->title}}</h2>
                    </div>
                  </a>
                </div>
                @endforeach
              </div>

              {{-- <div class="row mt-5">
                <div class="col-md-12 text-center">
                  <nav aria-label="Page navigation" class="text-center">
                    <ul class="pagination">
                      <li class="page-item  active"><a class="page-link" href="#">&lt;</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">4</a></li>
                      <li class="page-item"><a class="page-link" href="#">5</a></li>
                      <li class="page-item"><a class="page-link" href="#">&gt;</a></li>
                    </ul>
                  </nav>
                </div>
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
    
      @include('partials._wordify.footer')
      <!-- END footer -->

    </div>
    
    @include('partials._wordify.scripts')
  </body>
</html>