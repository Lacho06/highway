<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Highway Single Post</title>
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
            <a href="{{route('index')}}">Gala<em>xy</em></a>
        </div>
      <div class="menu-icon">
        <span></span>
      </div>
    </nav>

    <div class="page-heading">
        <div class="container">
            <div class="heading-content">
                <h1>Single <em>Post</em></h1>
            </div>
        </div>
    </div>


    <div class="blog-entries">
        <div class="container">
            <div class="col-md-12">
                <div class="blog-posts">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="single-blog-post">
                                <img src="{{Storage::url($post->image->url)}}" alt="">
                                <div class="text-content">
                                    <h2>{{$post->title}}</h2>
                                    <span><a href="#">{{$post->user->name}}</a> / <a href="#">{{$post->created_at->diffForHumans()}}</a> / <a href="#">Branding</a></span>
                                    <p>
                                        {{$post->text}}
                                	<br><br><a href="{{route('blog')}}">Back to Blog</a></p>
                                    {{-- <div class="tags-share">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul class="tags">
                                                    <li>Tags:</li>
                                                    <li><a href="#">life</a>,</li>
                                                    <li><a href="#">nature</a>,</li>
                                                    <li><a href="#">life is good</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="share">
                                                    <li>Share:</li>
                                                    <li><a href="#">facebook</a>,</li>
                                                    <li><a href="#">twitter</a>,</li>
                                                    <li><a href="#">behance</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-3">
                <div class="side-bar">
                    <div class="search">
                        <fieldset>
                            <input name="search" type="text" class="form-control" id="search" placeholder="Search..." required="">
                        </fieldset>
                    </div>
                    <div class="archives">
                        <div class="sidebar-heding">
                            <h2>Archives</h2>
                        </div>
                        <ul>
                            <li><a href="#">> 2018 September (4)</a></li>
                            <li><a href="#">> 2018 August (16)</a></li>
                            <li><a href="#">> 2018 July (5)</a></li>
                            <li><a href="#">> 2018 May (3)</a></li>
                            <li><a href="#">> 2018 February (27)</a></li>
                            <li><a href="#">> 2017 December (18)</a></li>
                            <li><a href="#">> 2017 November (12)</a></li>
                        </ul>
                    </div>
                    <div class="recent-posts">
                        <div class="sidebar-heding">
                            <h2>Recent Posts</h2>
                        </div>
                        <ul>
                            <li><a href="#">
                                <img src="{{asset('template/img/recent_post_1.png')}}" alt="Recent Post 1">
                                <div class="text">
                                    <h6>Duis mollis orci</h6>
                                    <span>15 September 2018</span>
                                </div>
                            </li></a>
                            <li><a href="#">
                                <img src="{{asset('template/img/recent_post_2.png')}}" alt="Recent Post 2">
                                <div class="text">
                                    <h6>Etiam quis tem</h6>
                                    <span>10 August 2018</span>
                                </div>
                            </li></a>
                            <li><a href="#">
                                <img src="{{asset('template/img/recent_post_3.png')}}" alt="Recent Post 3">
                                <div class="text">
                                    <h6>Proin at augue</h6>
                                    <span>16 July 2018</span>
                                </div>
                            </li></a>
                        </ul>
                    </div>
                    <div class="categories">
                        <div class="sidebar-heding">
                            <h2>Categories</h2>
                        </div>
                        <ul>
                            <li><a href="#">> Lifestyle (7)</a></li>
                            <li><a href="#">> Branding (9)</a></li>
                            <li><a href="#">> Nature (14)</a></li>
                            <li><a href="#">> Work Stuff (6)</a></li>
                            <li><a href="#">> Science (5)</a></li>
                        </ul>
                    </div>
                    <div class="latest-gallery">
                        <div class="sidebar-heding">
                            <h2>Latest Gallery</h2>
                        </div>
                        <ul>
                            <li><a href="#"></a><img src="{{asset('template/img/latest_gallery_1.png')}}" alt=""></a></li>
                            <li><a href="#"></a><img src="{{asset('template/img/latest_gallery_2.png')}}" alt=""></a></li>
                            <li><a href="#"></a><img src="{{asset('template/img/latest_gallery_3.png')}}" alt=""></a></li>
                            <li><a href="#"></a><img src="{{asset('template/img/latest_gallery_4.png')}}" alt=""></a></li>
                            <li><a href="#"></a><img src="{{asset('template/img/latest_gallery_5.png')}}" alt=""></a></li>
                            <li><a href="#"></a><img src="{{asset('template/img/latest_gallery_6.png')}}" alt=""></a></li>
                            <li><a href="#"></a><img src="{{asset('template/img/latest_gallery_7.png')}}" alt=""></a></li>
                            <li><a href="#"></a><img src="{{asset('template/img/latest_gallery_8.png')}}" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div> --}}
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
            <form id="contact" action="" method="post">
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
                      <a href="{{route('index')}}">Home - Full-width</a>
                  </li>
                  {{-- <li>
                      <a href="masonry.html">Home - Masonry</a>
                  </li>
                  <li>
                      <a href="grid.html">Home - Small-width</a>
                  </li> --}}
                  <li>
                      <a href="{{route('about')}}">About Us</a>
                  </li>
                  <li>
                      <a href="{{route('blog')}}">Blog Entries</a>
                  </li>
                  {{-- <li>
                      <a href="{{route('single-post')}}">Single Post</a>
                  </li> --}}
              </ul>
              <p>We create awesome templates for you</p>
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
