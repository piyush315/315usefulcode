	<?php
  $home_url = get_home_url();
  $custom_url = $home_url . $_SERVER['REQUEST_URI'];	
	?>
	<link type="text/css" rel="stylesheet" href="<?php echo $home_url;?>/wp-content/themes/stately/css/google_map_css.css">
	<div class="main_map_field_content">
	<div class="homes_value_div">
	<label class="homes_value">How much is your home's value?</label>
	</div>
	<form method="POST" action="<?php echo $home_url;?>/confirm-address/">
	<label class="get_report">Your Home's Value Has Changed! Get Your New Home Value Now!</label>
    <div id="locationField">
      <input id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text" name="address_search"></input>
      <input type="hidden" name="custom_url" value="<?php echo $custom_url;?>"/>

    </div>

    <table id="address">
      <tr>
        <td class="label">Street address</td>
        <td class="slimField"><input class="field" id="street_number"
              disabled="true"></input></td>
        <td class="wideField" colspan="2"><input class="field" id="route"
              disabled="true"></input></td>
      </tr>
      <tr>
        <td class="label">City</td>
        <!-- Note: Selection of address components in this example is typical.
             You may need to adjust it for the locations relevant to your app. See
             https://developers.google.com/maps/documentation/javascript/examples/places-autocomplete-addressform
        -->
        <td class="wideField" colspan="3"><input class="field" id="locality"
              disabled="true"></input></td>
      </tr>
      <tr>
        <td class="label">State</td>
        <td class="slimField"><input class="field"
              id="administrative_area_level_1" disabled="true"></input></td>
        <td class="label">Zip code</td>
        <td class="wideField"><input class="field" id="postal_code"
              disabled="true"></input></td>
      </tr>
      <tr>
        <td class="label">Country</td>
        <td class="wideField" colspan="3"><input class="field"
              id="country" disabled="true"></input></td>
      </tr>
    </table>
	<input type="submit" name="submit" value="Get Value Estimate"/>
</form>
</div>
    <script>

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {       
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDrCBb70BS6By_xGoCyK-eI5lL5oFPhPiw&libraries=places&callback=initAutocomplete" async defer></script>       
		
<?php

