<?php
$options = compact('mapType', 'tagAttributes');
if ($map = $this->Ggeo->map($options)) {
        echo $this->Html->tag('h3', __('Map', true));
        echo $this->Ggeo->loadGmap();
        echo $this->Html->tag('div', '', $map['options']['tagAttributes']);
        $node_geo = $map['node']['GgeoGeo'];
?>

<script type="text/javascript">
        var map<?php echo $node_geo['id'];?> = new GMap2(document.getElementById("ggeo-map-<?php echo $node_geo['id'];?>"));
        var point<?php echo $node_geo['id'];?> = new GLatLng(<?php echo $node_geo['lat'];?>, <?php echo $node_geo['lon'];?>);
        map<?php echo $node_geo['id'];?>.setMapType(<?php echo $map['options']['mapType'];?>);
        map<?php echo $node_geo['id'];?>.setCenter(point<?php echo $node_geo['id'];?>, 13);
        map<?php echo $node_geo['id'];?>.addOverlay(new GMarker(point<?php echo $node_geo['id'];?>));
</script>

<?php
} ?>