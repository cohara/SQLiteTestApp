<?php
require '../functions/services.php';

echo json_encode(getServices($_GET["id"]));
