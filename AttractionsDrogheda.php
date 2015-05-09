<!doctype html>
<html>
<head>
<meta charset="UTF-8">

<title>Meath Gold Coast</title> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet"  href="css/themes/default/jquery.mobile-1.4.0.min.css">

<link rel="stylesheet"  href="css/design.css">





<script src="js/jquery.js"></script>

	<script src="js/jquery.mobile-1.4.0.min.js"></script>

<script src="js/script.js"></script> <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
</head>

<body>

<div data-role="page">

<!-- Header end -->
	
	<div  data-id="dojoheader" data-role="header" data-theme="b" class="ui-header ui-bar-a" style="background-color:#3300CC" data-position="fixed">
	<div class="bannerbox" style="background-color:#3f8de0; height:109px">
            <img id="logo" style="float:right;height:109px" src="MGCBanner.JPG">
         </div>
		 
         <h1 class="ui-title">Drogheda Attractions</h1>
		
		 <a href="#left-panel" data-icon="bars" data-iconpos="notext" data-shadow="false" data-iconshadow="false">Menu</a>
		 
		<a data-icon="home" data-iconpos="notext" data-direction="reverse" href="index.html">Home</a> 
		 
      </div>
	
	<div role="main" class="ui-content">
	




<ul data-role="listview" data-inset="true">
<li><a href="Attractions.php">Back</a></li>
<li><a href="AttractionsDroghedaChurches.php"> <img src="icons/church.png"/> Churches</a></li>

</ul>

<?php

$AttractionID=$_GET["id"];

// Create connection
$con=mysqli_connect("localhost","m563520_Conor","MeathG0ldC0ast2015","m563520_MeathGoldCoast");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Select Data
$sql="SELECT * FROM Attractions where AttractionID=".$AttractionID;

$result = mysqli_query($con, $sql);
		

// Select Data
$sql="SELECT AttractionID, Name, Logo1 FROM Attractions where Ranking>200 AND Ranking<300 AND Display=1 order by Ranking";

$result = mysqli_query($con, $sql);

    while($row = mysqli_fetch_array($result)) {
	
		echo "<ul data-role='listview' data-inset='true'><li><a href='http://app.meathgoldcoast.com/AttractionsInfo.php?id=".$row['AttractionID']."'><img src='"."AttractionImages/".$row['Logo1']."'>".$row['Name']."</a></li></ul>\n";
	
    }


mysqli_close($con);
?>



</div>

<div data-role="panel" id="left-panel">
        <div class="panelhtml"></div>
    </div><!-- /panel -->
	
		</div>
	<div data-role="footer">

</div>


</body>

</html>