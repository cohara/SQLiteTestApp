<?php
$ServiceID=$_GET["id"];

require "functions/services.php";

$service = getServices($ServiceID);
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
                center: new google.maps.LatLng(<?=$service['MapLAT']?>, <?=$service['MapLNG']?>),
                zoom: 12,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            
            var map = new google.maps.Map(mapCanvas, mapOptions);
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(<?=$service['MapLAT']?>, <?=$service['MapLNG']?>),
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

		<h1 id="serviceTitle" class="ui-title"><?=$service["Name"]?></h1>
			<a href="#left-panel" data-icon="bars" data-iconpos="notext" data-shadow="false" data-iconshadow="false">Menu</a>
			<a data-icon="home" data-iconpos="notext" data-direction="reverse" href="index.html">Home</a> 
		</div>

		<div role="main" class="ui-content">
			<ul data-role="listview" data-inset="true">
				<li><a onclick="history.go(-1)">Back</a></li>
			</ul>
			<p><img src="ServicePics/<?=$service['Picture1']?>"></p>
			
			<?php
			if(!empty($service['Picture2'])) {
				?>
				<p><img src="ServicePics/<?=$service['Picture2']?>"></p>
				<?php
			}
			?>
			
			<p><h1><?=$service['Name']?></h1></p>
			
		
			<p style='font-weight:normal'>Tel: <?=$service['Phone']?></p>
			<p style='font-weight:normal'>Email: <a href='mailto:<?=$service['Email']?>'><?=$service['Email']?></a></p>
            <p style='font-weight:normal'>
            <a href='http://<?=$row['Website']?>' target='_blank'><?=$service['Website']?></a>
			</p>
			<p style='font-weight:bold'><?=$service['Header1']?></p>
			<p style='font-weight:normal'><?=$service['Para1']?></p>
			<p style='font-weight:normal'><?=$service['Para2']?></p>
			<p style='font-weight:normal'><?=$service['Para3']?></p>
			<p style='font-weight:normal'><?=$service['Para4']?></p>
			
			<p style='font-weight:bold'><?=$service['Header2']?></p>
			<p style='font-weight:normal'><?=$service['Para5']?></p>
			<p style='font-weight:normal'><?=$service['Para6']?></p>
			
			<br/>
			
			<p style='font-weight:normal'>
				<b>Location: </b>
				<?=$service['HouseNo']?>
				<?=$service['Building']?>
				<?=$service['Road']?>,
				<?=$service['Street']?>,
				<?=$service['Town']?>,
				Co. <?=$service['County']?>
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
