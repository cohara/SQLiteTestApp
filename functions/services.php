<?php
function escape_csv_value($value) {
	$value = str_replace('"', '""', $value); // First off escape all " and make them ""
	if(preg_match('/,/', $value) or preg_match("/\n/", $value) or preg_match('/"/', $value)) { // Check if I have any commas or new lines
		return '"'.$value.'"'; // If I have new lines or commas escape them
	} else {
		return $value; // If no new lines or commas just return the value
	}
}

function getServices($id) {
	// Create connection
	$con=mysqli_connect("localhost","m563520_Conor","MeathG0ldC0ast2015","m563520_MeathGoldCoast");

	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	// Select Data
	$sql="SELECT * FROM MGC_Services where ServiceID=" . $id;

	$result = mysqli_query($con, $sql);
	
	// $services = array();

	while($row = mysqli_fetch_array($result)) {
		$service = array(
			'ServiceId' => $row['ServiceID'],
			'Name' => $row['Name'],
			'HouseNo' => $row['HouseNo'],
			'Building' => $row['Building'],
			'Road' => $row['Road'],
			'Street' => $row['Street'],
			'Town' => $row['Town'],
			'County' => $row['County'],
			'Phone' => $row['Phone'],
			'Email' => $row['Email'],
            'Website' => $row['Website'],
			'MapLAT' => $row['MapLAT'],
			'MapLNG' => $row['MapLNG'],
			'Logo1' => $row['Logo1'],
			'Logo2' => $row['Logo2'],
			'Picture1' => $row['Picture1'],
			'Picture2' => $row['Picture2'],
			'Header1' => $row['Header1'],
			'Header2' => $row['Header2'],
			'Para1' => $row['Para1'],
			'Para2' => $row['Para2'],
			'Para3' => $row['Para3'],
			'Para4' => $row['Para4'],
			'Para5' => $row['Para5'],
			'Para6' => $row['Para6'],
			'Ranking' => $row['Ranking'],
			'Display' => $row['Display']
		);
		// Convert into an associative array
		return $service;
	}

	mysqli_close($con);
	
	// return $services;
}