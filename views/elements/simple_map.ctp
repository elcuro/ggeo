<?php
if (is_numeric($node['GgeoGeo']['lat']) && is_numeric($node['GgeoGeo']['lon'])) {
?>

<?php
echo $this->Ggeo->loadGmap();
$geo = $node['GgeoGeo'];

?>

<div id="ggeo-map-<?php echo $geo['id'];?>" style="width: 200px; height: 200px;"></div>

<script type="text/javascript">
        var map<?php echo $geo['id'];?> = new GMap2(document.getElementById("ggeo-map-<?php echo $geo['id'];?>"));
        var point<?php echo $geo['id'];?> = new GLatLng(<?php echo $geo['lat'];?>, <?php echo $geo['lon'];?>);
        map<?php echo $geo['id'];?>.setMapType(G_HYBRID_MAP);
        map<?php echo $geo['id'];?>.setCenter(point<?php echo $geo['id'];?>, 13);
        map<?php echo $geo['id'];?>.addOverlay(new GMarker(point<?php echo $geo['id'];?>));
</script>

<?php
} ?>