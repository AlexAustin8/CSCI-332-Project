<?php
require_once 'dbconnect.php';

$sql = "insert into stock(type,name,costPerUnit,currentStock) VALUES ('" . $_REQUEST['type'] . 
  "','" . $_REQUEST['name'] . "','" . $_REQUEST['costPerUnit'] . "','" . $_REQUEST['currentStock'] . "')";
echo $sql;
if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='liststock.php'; </script>