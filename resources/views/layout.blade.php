<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

<meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>ReRiseMap</title>

  <!-- Bootstrap Core CSS -->
  <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">

  <!-- Fonts -->
  <link href="{{ asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/nivo-lightbox.css')}}" rel="stylesheet" />
  <link href="{{ asset('css/nivo-lightbox-theme/default/default.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('css/animate.css')}}" rel="stylesheet" />
  <!-- Squad theme CSS -->
  <link href="{{ asset('css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('color/default.css')}}" rel="stylesheet">
  <!-- =======================================================
    Theme Name: Ninestars
    Theme URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body data-spy="scroll">

  <div class="container">
    <ul id="gn-menu" class="gn-menu-main">
      <li class="gn-trigger">
        <a class="gn-icon gn-icon-menu"><span>Menu</span></a>
        <nav class="gn-menu-wrapper">
          <div class="gn-scroller">
            <ul class="gn-menu">
              <li class="gn-search-item">
                <input placeholder="Search" type="search" class="gn-search">
                <a class="gn-icon gn-icon-search"><span>Search</span></a>
              </li>
              <li>
                <a href="/#about" class="gn-icon gn-icon-download">Despre</a>
              </li>
              <li>
                <a href="/put-markers-map" class="gn-icon gn-icon-download">Sunt in pericol</a>
              </li>
              <li>
                <a href="/buildings-map/0" class="gn-icon gn-icon-download">Harta cladiri in pericol</a>
              </li>
              <li><a href="#clasa1" class="gn-icon gn-icon-help">Clasa I de risc seismic</a></li>
              <li><a href="#clasa2" class="gn-icon gn-icon-help">Clasa a II-a de risc seismic</a></li>
              <li><a href="#clasa3" class="gn-icon gn-icon-help">Clasa a III-a de risc seismic</a></li>
              <li>
                <a href="#contact" class="gn-icon gn-icon-archive">Contact</a>
              </li>
            </ul>
          </div>
          <!-- /gn-scroller -->
        </nav>
      </li>
      <li> <a style="color:red" href="/put-markers-map"><span><i class="fa fa-exclamation-triangle"></i> &nbsp;</span>Sunt in pericol</a>
     </li>
      <li><a href="/">ReRise</a></li>
      <li><b>Linie urgenta Re-Rise : 0434 432 234</b></li>
      <li class="hidden-xs">
        <ul class="company-social">
          <li class="social-facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
          <li class="social-google"><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
        </ul>
      </li>
    </ul>
  </div>

   @yield('content')

  <footer>
    <div class="container">

          <div class="row">
            <div class="col-lg-12">
              <address>
                <strong>@ReRise.org</strong><br>
                  <a href="http://rerise.org">http://rerise.org </a><br>
                  <abbr title="Phone">P:</abbr> 0434 432 234
                  <br>
                  <br>
                  <strong>Email</strong><br>

                <a href="mailto:#">office@rerise.org</a><br/>
              </address>
            </div>

      <div class="row">
        <div class="col-md-12 col-lg-12">
          <p>&copy; FSociety</p>
          <div class="credits">
            <!-- 
              All the links in the footer should remain intact. 
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Ninestars
            -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Core JavaScript Files -->
  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/jquery.easing.min.js')}}"></script>
  <script src="{{asset('js/classie.js')}}"></script>
  <script src="{{asset('js/gnmenu.js')}}"></script>
  <script src="{{asset('js/jquery.scrollTo.js')}}"></script>
  <script src="{{asset('js/nivo-lightbox.min.js')}}"></script>
  <script src="{{asset('js/stellar.js')}}"></script>
  <!-- Custom Theme JavaScript -->
  <script src="{{asset('js/custom.js')}}"></script>
  <script src="{{asset('contactform/contactform.js')}}"></script>

</body>

</html>