<!--
To seen map, after user click on "Plein écran" page map.php.
-->
<html>
<head>
<?php include_once("config.php"); ?>
<script src="config.js"></script>
<title>Map Full Screen Bus</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyBNocSKnUTtFo4UD-LYQKb3XxAhuhTIVUU"></script>
<script src="scripts/map.js"></script>

<style>
body, #map-canvas {
		height: 100%;
        margin: 0px;
        padding: 0px
}
 paper-button.colored {
      color: #4285f4;
    }

    paper-button[raised].colored {
      background: #4285f4;
      color: #fff;
    }

    paper-button.custom > core-icon {
      margin-right: 4px;
    }

    paper-button.hover:hover {
      background: #eee;
    }

    paper-button.blue-ripple::shadow #ripple {
      color: #4285f4;
    }

</style>
</head>
<body style="width=100%">
<div id="map-canvas"></div>
</body>
</html>