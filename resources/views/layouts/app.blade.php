<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bullding Site | @yield('title')</title>
    {{-- styles & fonts--}}
     {!! Html::style('src/frontend/css/font-awesome.min.css') !!}
     {!! Html::style('src/frontend/css/bootstrap.min.css') !!}
     {!! Html::style('src/frontend/css/flexslider.css') !!}
     {!! Html::style('src/frontend/css/style.css') !!}
     <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
    @yield('styles')

</head>
<body id="app-layout">
     {{-- header --}}
          <div class="header">
            <div class="container"> <a class="navbar-brand" href="{{ url('/') }}"><i class="fa fa-paper-plane"></i> ONE</a>
              <div class="menu"> <a class="toggleMenu" href="#">{!! Html::image('src/frontend/images/nav_icon.png') !!}</a>
                <ul class="nav" id="nav">
                  <li  {{ Request::is('home') ? 'class=current' : '' }}><a href="{{ route('home') }}">Home</a></li>
                  <li><a href="about.html">About Us</a></li>
                  <li><a href="services.html">Services</a></li>
                  <li><a href="contact.html">Contact Us</a></li>
                  <!-- Authentication Links -->
                  @if (Auth::guest())
                      <li><a href="{{ url('/login') }}">Login</a></li>
                      <li><a href="{{ url('/register') }}">Register</a></li>
                  @else
                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              {{ Auth::user()->name }} <span class="caret"></span>
                          </a>

                          <ul class="dropdown-menu" role="menu">
                              <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                          </ul>
                      </li>
                  @endif
                  <div class="clear"></div>
                </ul>

              </div>
            </div>
          </div>
     {{-- header --}}

    @yield('content')
    {{-- footer --}}
          <div class="footer">
               <div class="footer_bottom">
                    <div class="follow-us"> <a class="fa fa-facebook social-icon" href="#"></a> <a class="fa fa-twitter social-icon" href="#"></a> <a class="fa fa-linkedin social-icon" href="#"></a> <a class="fa fa-google-plus social-icon" href="#"></a> </div>
                    <div class="copy">
                         <p>Copyright &copy; 2015 Company Name. Design by <a href="http://www.templategarden.com" rel="nofollow">TemplateGarden</a></p>
                    </div>
               </div>
          </div>

    {{-- footer --}}

    {{-- scripts --}}
    {!! Html::script('src/frontend/js/jquery.min.js') !!}
    {!! Html::script('src/frontend/js/bootstrap.min.js') !!}
    {!! Html::script('src/frontend/js/jquery.flexslider.js') !!}
    {!! Html::script('src/frontend/js/responsive-nav.js') !!}
    <script type="application/x-javascript">
          addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
     </script>
    @yield('footer')
</body>
</html>
