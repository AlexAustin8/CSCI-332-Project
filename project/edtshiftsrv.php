<?php
require_once 'dbconnect.php';

$sql = "update shift set dateAndTime = '" . $_REQUEST['dateAndTime'] . 
  "',manager='" . $_REQUEST['manager'] . "',salesAmount='" . $_REQUEST['salesAmount'] . "'";

echo $sql;

if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='listshifts.php'; </script>