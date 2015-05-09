<?php
function escape_csv_value($value) {
	$value = str_replace('"', '""', $value); // First off escape all " and make them ""
	if(preg_match('/,/', $value) or preg_match("/\n/", $value) or preg_match('/"/', $value)) { // Check if I have any commas or new lines
		return '"'.$value.'"'; // If I have new lines or commas escape them
	} else {
		return $value; // If no new lines or commas just return the value
	}
}

function getServiceType($id) {
	// Create connection
	$con=mysqli_connect("localhost","m563520_Conor","MeathG0ldC0ast2015","m563520_MeathGoldCoast");

	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	// Select Data
	$sql="SELECT * FROM ServiceTypes where Service=" . $id;

	$result = mysqli_query($con, $sql);
	
	// $services = array();

	while($row = mysqli_fetch_array($result)) {
		$serviceTYPE = array(
			'Service' => $row['Service'],
			'ServiceIcon' => $row['ServiceIcon']
            
		);
		// Convert into an associative array
		return $serviceTYPE;
	}

	mysqli_close($con);
	
	// return $serviceTYPE;
}