<?php
require '../functions/ServiceCategory.php';

echo json_encode(getServiceCATEGORY($_GET["id"]));
