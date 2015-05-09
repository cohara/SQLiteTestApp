<?php
$AttractionID=$_GET["id"];

require "functions/attractions.php";

$attraction = getAttractions($AttractionID);
?>

<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">

<title>Meath Gold Coast</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet"  href="css/themes/default/jquery.mobile-1.4.0.min.css">
<link rel="stylesheet"  href="css/design.css">

<script src="js/jquery.js"></script>
<script src="js/jquery.mobile-1.4.0.min.js"></script>
<script src="js/script.js"></script>
    
        <!-- TODO externalize Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <style>
        #map-canvas {
            width: 300px;
            height: 250px;
            background-color: #CCC;
        }
    </style>
    <script>
        function initialize() {
            var mapCanvas = document.getElementById('map-canvas');
            var mapOptions = {
                center: new google.maps.LatLng(<?=$attraction['MapLAT']?>, <?=$attraction['MapLNG']?>),
                zoom: 12,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            
            var map = new google.maps.Map(mapCanvas, mapOptions);
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(<?=$attraction['MapLAT']?>, <?=$attraction['MapLNG']?>),
                map: map
            });
        }
          
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    
</head>

<body>
<div data-role="page">
	<div  data-id="dojoheader" data-role="header" data-theme="b" class="ui-header ui-bar-a" style="background-color:#3300CC" data-position="fixed">
		<div class="bannerbox" style="background-color:#3f8de0; height:109px">
			<img id="logo" style="float:right;height:109px" src="MGCBanner.JPG">
		</div>

		<h1 id="attractionTitle" class="ui-title"><?=$attraction["Name"]?></h1>
			<a href="#left-panel" data-icon="bars" data-iconpos="notext" data-shadow="false" data-iconshadow="false">Menu</a>
			<a data-icon="home" data-iconpos="notext" data-direction="reverse" href="index.html">Home</a> 
		</div>

		<div role="main" class="ui-content">
			<ul data-role="listview" data-inset="true">
				<li><a onclick="history.go(-1)">Back</a></li>
			</ul>
			<p><img src="AttractionImages/<?=$attraction['Picture1']?>"></p>
			
			<?php
			if(!empty($attraction['Picture2'])) {
				?>
				<p><img src="AttractionImages/<?=$attraction['Picture2']?>"></p>
				<?php
			}
			?>
			
			<p><h1><?=$attraction['Name']?></h1></p>
			
			
			<p style='font-weight:normal'>Tel: <?=$attraction['Phone']?></p>
			<p style='font-weight:normal'>Email: <a href='mailto:<?=$attraction['Email']?>'><?=$attraction['Email']?></a></p>
			<p style='font-weight:bold'><?=$attraction['Header1']?></p>
			<p style='font-weight:normal'><?=$attraction['Para1']?></p>
			<p style='font-weight:normal'><?=$attraction['Para2']?></p>
			<p style='font-weight:normal'><?=$attraction['Para3']?></p>
			<p style='font-weight:normal'><?=$attraction['Para4']?></p>
			
			<p style='font-weight:bold'><?=$attraction['Header2']?></p>
			<p style='font-weight:normal'><?=$attraction['Para5']?></p>
			<p style='font-weight:normal'><?=$attraction['Para6']?></p>
			
			<br/>
			
			<p style='font-weight:normal'>
				<b>Location: </b>
				<?=$attraction['HouseNo']?>
				<?=$attraction['Building']?>
				<?=$attraction['Road']?>,
				<?=$attraction['Street']?>,
				<?=$attraction['Town']?>,
				Co. <?=$attraction['County']?>
			</p>
			
			<p style='font-weight:normal'>
				<a href='http://<?=$row['Website']?>' target='_blank'><?=$attraction['Website']?></a>
			</p>
			
			<div id="map-canvas"></div>
		</div>
	  
		<div data-role="panel" id="left-panel">
			<div class="panelhtml"></div>
		</div><!-- /panel -->
	</div>

</div>

<div data-role="footer"></div>

</body>
</html>
