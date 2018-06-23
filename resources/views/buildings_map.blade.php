<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

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
  <link href="{{ asset('css/map.css')}}" rel="stylesheet">
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
                <a href="#about" class="gn-icon gn-icon-download">Despre</a>
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
      <!-- <li><a href="index.html">ReRise</a></li> -->
      <li><b>Linie urgenta Re-Rise : 0434 432 234</b></li>
      <li class="hidden-xs">
        <ul class="company-social">
          <li class="social-facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
          <li class="social-google"><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
        </ul>
      </li>
    </ul>
  </div>

  <section class="home-section text-center">
    <div>
      <h1>Map</h1>
      
      <div class="pac-card" id="pac-card">
      <div>
        <div id="title">
          Autocomplete search
        </div>
        <div id="type-selector" class="pac-controls">
          <input type="radio" name="type" id="changetype-all" checked="checked">
          <label for="changetype-all">All</label>

          <input type="radio" name="type" id="changetype-establishment">
          <label for="changetype-establishment">Establishments</label>

          <input type="radio" name="type" id="changetype-address">
          <label for="changetype-address">Addresses</label>

          <input type="radio" name="type" id="changetype-geocode">
          <label for="changetype-geocode">Geocodes</label>
        </div>
        <div id="strict-bounds-selector" class="pac-controls">
          <input type="checkbox" id="use-strict-bounds" value="">
          <label for="use-strict-bounds">Strict Bounds</label>
        </div>
      </div>
      <div id="pac-container">
        <input id="pac-input" type="text"
            placeholder="Enter a location">
      </div>
    </div>
    <div id="map"></div>
    <div id="infowindow-content">
      <img src="" width="16" height="16" id="place-icon">
      <span id="place-name"  class="title"></span><br>
      <span id="place-address"></span>
    </div>

    </div>
  </section>
  
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
  <!-- <script src="{{asset('js/jquery.min.js')}}"></script> -->
  <script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
    
    
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


 <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13
        });
        var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
        var types = document.getElementById('type-selector');
        var strictBounds = document.getElementById('strict-bounds-selector');

        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindowContent.children['place-icon'].src = place.icon;
          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-address'].textContent = address;
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);

        document.getElementById('use-strict-bounds')
            .addEventListener('click', function() {
              console.log('Checkbox clicked! New state=' + this.checked);
              autocomplete.setOptions({strictBounds: this.checked});
            });
      }
    </script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuUyRkHWpdoe6MTege8frZbNco9cRNP1c&libraries=places&callback=initMap" async defer></script>
</body>

</html>