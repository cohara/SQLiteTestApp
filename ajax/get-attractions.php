<?php
require '../functions/attractions.php';

echo json_encode(getAttractions($_GET["id"]));
