<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>About Highway - Free CSS Template</title>
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
                <h1>About <em>Us</em></h1>
            </div>
        </div>
    </div>


    <div class="services">
        <div class="container">
            <div class="col-md-4 col-sm-6">
                <div class="service-item">
                    <div class="icon">
                        <img src="{{asset('template/img/service_1.png')}}" alt="">
                    </div>
                    <div class="text">
                        <h4>FREE CSS TEMPLATE</h4>
                        <p>Highway is a good CSS template that is available for free. Please tell your friends about templatemo site. Thank you.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="service-item">
                    <div class="icon">
                        <img src="{{asset('template/img/service_2.png')}}" alt="">
                    </div>
                    <div class="text">
                        <h4>Aenean pellentesque</h4>
                        <p>Donec et nisi sed magna tincidunt fermentum. Pellentesque eget semper felis, sit amet scelerisque neque.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="service-item">
                    <div class="icon">
                        <img src="{{asset('template/img/service_3.png')}}" alt="">
                    </div>
                    <div class="text">
                        <h4>Quisque et odio</h4>
                        <p>Donec et nisi sed magna tincidunt fermentum. Pellentesque eget semper felis, sit amet scelerisque neque.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="service-item">
                    <div class="icon">
                        <img src="{{asset('template/img/service_4.png')}}" alt="">
                    </div>
                    <div class="text">
                        <h4>Nullam et justo</h4>
                        <p>Donec et nisi sed magna tincidunt fermentum. Pellentesque eget semper felis, sit amet scelerisque neque.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="service-item">
                    <div class="icon">
                        <img src="{{asset('template/img/service_5.png')}}" alt="">
                    </div>
                    <div class="text">
                        <h4>Integer ac justo</h4>
                        <p>Donec et nisi sed magna tincidunt fermentum. Pellentesque eget semper felis, sit amet scelerisque neque.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="service-item">
                    <div class="icon">
                        <img src="{{asset('template/img/service_6.png')}}" alt="">
                    </div>
                    <div class="text">
                        <h4>Nunc sit amet nibh</h4>
                        <p>Donec et nisi sed magna tincidunt fermentum. Pellentesque eget semper felis, sit amet scelerisque neque.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="more-about-us">
        <div class="container">
            <div class="col-md-5 col-md-offset-7">
                <div class="content">
                    <h2>Aenean vehicula tincidunt</h2>
                    <span>Donec et nisi sed</span>
                    <p>Vivamus vitae libero euismod, pretium magna a, vulputate metus. Curabitur et arcu felis. Praesent aliquet lectus in purus viverra varius.
                    <br><br>Suspendisse et rutrum nisl. Phasellus porttitor metus vel justo blandit, in finibus neque elementum. Nullam semper, turpis quis egestas consequat, dui eros tristique lectus, ac euismod ex quam id mauris.</p>
                    <div class="simple-btn">
                        <a href="#">Continue Reading</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="pricing-tables">
        <div class="container">
            @foreach ($plans as $plan)

                <div class="col-md-4 col-sm-6">
                    <div class="table-item">
                        <h4>${{$plan->price}}</h4>
                        <span>{{$plan->name}}</span>
                        <ul>
                            @foreach ($plan->features as $feature)
                                <li>{{$feature->name}}</li>
                            @endforeach
                        </ul>
                        <div class="simple-btn">
                            <a href="#">Details</a>
                        </div>
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
                      <a href="#">Single Post</a>
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
