<?php
require '../functions/hotels.php';

echo json_encode(getHotels($_GET["id"]));
