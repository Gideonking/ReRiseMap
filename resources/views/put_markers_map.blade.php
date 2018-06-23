@extends('layout')

@section('content')
  <link href="{{ asset('css/map.css')}}" rel="stylesheet">


  <section class="home-section text-center">
    <div>
      <h1>
          Alert map - adauga locatia ta
      </h1>
      <div class="row form-group">

      <label for="details">Adauga o descriere</label>
      <br>
      <textarea class="form-input" name="details" id="details"></textarea>
            <div class="writeinfo">io</div>   
      </div>
        
        <!-- <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"> -->
      
      <div class="pac-card" id="pac-card">
      <div>
        <div id="title">
          Alert map - adauga locatia ta
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
  
 <script>
      var markers = [];

      function initMap() {

        var bucharest = {lat: 44.439663, lng: 26.096306};

          map = new google.maps.Map(document.getElementById('map'), {
          center: bucharest,
          zoom: 12
        });

        map.addListener('click', function(event) {
          addMarker(event.latLng);
        });

        addMarker(bucharest);

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
      function addMarker(location){
    var marker = new google.maps.Marker({
      position: location,
      map: map
    });
    markers.push(marker);
    alert(marker);
    alert(marker.position);
    alert(marker.position.lat());

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    
    $.ajax({
          /* the route pointing to the post function */
          url: '/save-alert-marker',
          type: 'POST',
          /* send the csrf-token and the input to the controller */
          // data: {_token: CSRF_TOKEN, message:$(".getinfo").val()},
          data: {
            _token: CSRF_TOKEN, 
            message: "hello marker",
            details: $('details').val()
          },
          dataType: 'JSON',
          /* remind that 'data' is the response of the AjaxController */
          success: function (data) { 
              alert("success");
              $(".writeinfo").append(data.msg); 
          },
          error: function (data) { 
              alert("error");
              $(".writeinfo").append(data.msg); 
          }
      }); 
  }
  
  function setMapOnAll(map){
    for(var i = 0; i < markers.length; i++) {
      markers[i].setMap(map);
    }
  }

  function clearMarkers() {
    setMapOnAll(null);
  }

  function showMarkers(){
    setMapOnAll(map);
  }

  function deleteMarkers() {
    clearMarkers();
    markers = [];
  }
    </script>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuUyRkHWpdoe6MTege8frZbNco9cRNP1c&libraries=places&callback=initMap" async defer></script>



@endsection
