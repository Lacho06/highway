<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  		<title>Highway - Free CSS Template</title>
<!--

Highway Template

https://templatemo.com/tm-520-highway

-->
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="{{asset('template/apple-touch-icon.png')}}">
        <link rel="stylesheet" href="{{asset('template/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('template/css/bootstrap-theme.min.css')}}">
        <link rel="stylesheet" href="{{asset('template/css/fontAwesome.css')}}">
        <link rel="stylesheet" href="{{asset('template/css/light-box.css')}}">
        <link rel="stylesheet" href="{{asset('template/css/templatemo-style.css')}}">

        <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700,800,900" rel="stylesheet">

        <script src="{{asset('template/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
    </head>

<body>

    <nav>
        <div class="logo">
            <a href="#">High<em>way</em></a>
        </div>
        <div class="menu-icon">
        <span></span>
      </div>
    </nav>

    <div id="video-container">
        <div class="video-overlay"></div>
        <div class="video-content">
            <div class="inner">
                <h1>Welcome to <em>Highway</em></h1>
                @if ($preference != null && $preference->main_title != null)
                    <p>{{$preference->main_title}}</p>
                @else
                    <p>FREE CSS TEMPLATE by templatemo</p>
                @endif
                @if ($preference != null && $preference->main_subtitle != null)
                    <p>{{$preference->main_subtitle}}</p>
                @else
                    <p>Homepage with full-width image gallery</p>
                @endif
                <div class="scroll-icon">
                    <a class="scrollTo" data-scrollTo="portfolio" href="#"><img src="{{asset('template/img/scroll-icon.png')}}" alt=""></a>
                </div>
            </div>
        </div>
        <video autoplay="" loop="" muted>
            @if ($preference != null && $preference->main_video != null)
                <source src="{{asset($preference->main_video)}}" type="video/mp4" />
            @else
        	    <source src="{{asset('template/highway-loop.mp4')}}" type="video/mp4" />
            @endif
        </video>
    </div>


    <div class="full-screen-portfolio" id="portfolio">
        <div class="container-fluid">

            @foreach ($categories as $category)

                <div class="col-md-4 col-sm-6">
                    <div class="portfolio-item">
                        <a href="{{Storage::url($category->cover_image)}}" data-lightbox="image-1"><div class="thumb">
                            <div class="hover-effect">
                                <div class="hover-content">
                                    <h1>{{$category->title}}</h1>
                                    <p>{{$category->subtitle}}</p>
                                </div>
                            </div>
                            <div class="image">
                                <img src="{{Storage::url($category->cover_image)}}">
                            </div>
                        </div></a>
                    </div>
                </div>

            @endforeach
        </div>
    </div>


    <footer>
        <div class="container-fluid">
            <div class="col-md-12">
                <p>Copyright &copy; 2018 Company Name

    | Designed by TemplateMo</p>
            </div>
        </div>
    </footer>


      <!-- Modal button -->
    <div class="popup-icon">
      <button id="modBtn" class="modal-btn"><img src="{{asset('template/img/contact-icon.png')}}" alt=""></button>
    </div>

    <!-- Modal -->
    <div id="modal" class="modal">
      <!-- Modal Content -->
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="header-title">Say hello to <em>Highway</em></h3>
          <div class="close-btn"><img src="{{asset('template/img/close_contact.png')}}" alt=""></div>
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
          <div class="col-md-6 col-md-offset-3">
            <form id="contact" action="{{route('contact')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                      <fieldset>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required="">
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Your email..." required="">
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required=""></textarea>
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="btn">Send Message Now</button>
                      </fieldset>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>



    <section class="overlay-menu">
      <div class="container">
        <div class="row">
          <div class="main-menu">
              <ul>
                  <li>
                      <a href="{{route('index')}}">Home</a>
                  </li>
                  {{-- <li>
                      <a href="#">Home - Masonry</a>
                  </li>
                  <li>
                      <a href="#">Home - Small-width</a>
                  </li> --}}
                  <li>
                      <a href="{{route('about')}}">About Us</a>
                  </li>
                  <li>
                      <a href="{{route('blog')}}">Blog</a>
                  </li>
                  {{-- <li>
                      <a href="{{route('single-post')}}">Single Post</a>
                  </li> --}}
              </ul>
              @if ($preference != null && $preference->nav_subtitle != null)
                <p>{{$preference->nav_subtitle}}</p>
              @else
                <p>We create awesome templates for you.</p>
              @endif
          </div>
        </div>
      </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="{{asset('template/js/vendor/jquery-1.11.2.min.js')}}"></script>
    <script src="{{asset('template/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('template/js/plugins.js')}}"></script>
    <script src="{{asset('template/js/main.js')}}"></script>


</body>
</html>
