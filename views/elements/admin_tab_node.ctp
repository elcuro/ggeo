<?php

echo $this->Ggeo->loadGMap();

echo $form->input('GgeoGeo.id');
echo $form->hidden('GgeoGeo.lat');
echo $form->hidden('GgeoGeo.lon');

echo $html->div('',
        $html->link(__('Delete this geo', true), '#', array('onclick' => 'deleteGeo();return false;')),
        array('id' => 'delete-geo'))

?>

<input type="text" size="40" id="search_adress" name="search_address" onkeypress="return disableEnter(event)" value="" />
<a href="#" onclick="showAddress(document.getElementById('search_adress').value); return false">
        <strong><?php __('Search'); ?></strong>
</a>

<div id="gmap" style="width: 800px; height: 450px;"></div>

<script type="text/javascript">
        var map = new GMap2(document.getElementById("gmap"));
        var geocoder = new GClientGeocoder();
        map.checkResize();
        map.setMapType(G_HYBRID_MAP);

        var lon = document.getElementById('GgeoGeoLon').value;
        var lat = document.getElementById('GgeoGeoLat').value;
        if (lat != '' && lon != '') {
                point = new GLatLng(lat,lon);
                map.setCenter(point, 13);
                setPoint(point);
        } else {
                map.setCenter(new GLatLng(<?php echo Configure::read('Ggeo.default_lat_lon');?>), 11);
                document.getElementById('delete-geo').style.visibility = 'hidden';
        }

        GEvent.addListener(map, 'click', function(overlay, point) {
                if (overlay) {
                        map.removeOverlay(overlay);
                }
                else if (point) {
                        setPoint(point);
                }
        });
        map.addControl(new GSmallMapControl());


        function showAddress(address) {
                if (geocoder) {
                        geocoder.getLatLng(
                                address,
                                function(point) {
                                        if (!point) {
                                                alert(address + " not found");
                                        } else {
                                                setPoint(point);
                                        }
                                }
                        );
                }
        }


        function setPoint(point) {
                map.panTo(point);
                map.clearOverlays();
                var marker = new GMarker(point);
                map.addOverlay(marker);
                document.getElementById('GgeoGeoLon').value = point.x;
                document.getElementById('GgeoGeoLat').value = point.y;
                document.getElementById('delete-geo').style.visibility = 'visible';
        }


        function disableEnter(evt){
                var k=evt.keyCode||evt.which;
                if(evt.keyCode==13){
                        showAddress(document.getElementById('search_adress').value);
                }
                return k!=13;
        }


        function deleteGeo(geoid) {
                map.clearOverlays();
                map.setCenter(new GLatLng(<?php echo Configure::read('Ggeo.default_lat_lon');?>), 11);
                document.getElementById('GgeoGeoLon').value = '';
                document.getElementById('GgeoGeoLat').value = '';
                document.getElementById('delete-geo').style.visibility = 'hidden';
        }

 </script>
