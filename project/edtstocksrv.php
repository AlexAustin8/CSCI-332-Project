<?php
require_once 'dbconnect.php';

$sql = "update stock set type = '" . $_REQUEST['type'] . 
  "',name='" . $_REQUEST['name'] . "',costPerUnit='" . $_REQUEST['costPerUnit'] . "',currentStock='" . $_REQUEST['currentStock']  . "' where name='" . $_REQUEST['name'] . "'";  
 


if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='liststock.php'; </script>