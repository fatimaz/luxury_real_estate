<style>
    #map-canvas{
        width:350px;
        height:250px;
    }
</style>

<div class ="container">
    <div class="col-sm-4">
        {{Form::open(array('url'=>'/web/profile/addlocation','files'=>true))}}

        <div class ="form-group">

            <input type="text" id="txtautocomplete">

        </div>

        <button class="btn btn-sm btn-danger">Save</button>
        {{Form::close()}}
    </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDp7SCRxP7IADMrLiNHgnpxhJbEfhnXtlk&libraries=places"
        type="text/javascript"></script>
<script type="text/javascript">
    google.maps.event.addDomListener(window, 'load', intilize);
    function intilize() {
        var autocomplete = new google.maps.places.Autocomplete(document.getElementById("txtautocomplete"));

        google.maps.events.AddListener(autocomplete, 'place_changed', function () {

            var place = autocomplete.getplace();
            var location = "Address: " + place.formatted_address + "<br/>";
            location += "Latitude: " + place.geometry.location.lat() + "<br/>";
            location += "Longitude: " + place.geometry.location.lng();
            document.getElementById('lblresult').innerHTML = location
        });

    };

</script>