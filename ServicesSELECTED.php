<?php

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
    
<script src="js/script.js"></script> <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
</head>

<body>

<div data-role="page">

<!-- Header end -->
	
	<div  data-id="dojoheader" data-role="header" data-theme="b" class="ui-header ui-bar-a" style="background-color:#3300CC" data-position="fixed">
	<div class="bannerbox" style="background-color:#3f8de0; height:109px">
            <img id="logo" style="float:right;height:109px" src="MGCBanner.JPG">
         </div>
		 
         <h1 class="ui-title">SERVICES</h1>
		
		 <a href="#left-panel" data-icon="bars" data-iconpos="notext" data-shadow="false" data-iconshadow="false">Menu</a>
		 
		<a data-icon="home" data-iconpos="notext" data-direction="reverse" href="index.html">Home</a> 
		 
      </div>
	
	<div role="main" class="ui-content">
	

<ul data-role="listview" data-inset="true">
<li><a onclick="history.go(-1)">Back</a></li>

</ul>

<?php

$ServiceTYPE=$_GET["id"];

$con = new PDO('mysql:dbname=m563520_MeathGoldCoast;host=127.0.0.1;charset=utf8', 'm563520_Conor', 'MeathG0ldC0ast2015');

$con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Select Data
$sql="SELECT MGC_Services.ServiceID,MGC_Services.Name,MGC_Services.Logo1,MGC_Services.Ranking,MGC_Services.Display, ServiceClassifications.ServiceIDENTITY, ServiceClassifications.ServiceType
FROM MGC_Services, ServiceClassifications
WHERE MGC_Services.ServiceID = ServiceClassifications.ServiceIDENTITY AND ServiceClassifications.ServiceType = :ServiceTYPE
ORDER by Ranking".$ServiceID;

$stmt = $con->prepare($sql);

$stmt->execute(array('ServiceTYPE' => $ServiceTYPE));


foreach ($stmt as $row) {
    // do something with $row
   echo "<ul data-role='listview' data-inset='true'><li><a href='http://app.meathgoldcoast.com/ServicesInfo.php?id=".$row['ServiceID']."'><img src='"."ServicePics/".$row['Logo1']."'>".$row['Name']."</a></li></ul>\n";
	}

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