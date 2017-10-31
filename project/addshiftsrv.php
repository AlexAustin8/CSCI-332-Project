<?php
require_once 'dbconnect.php';

$sql = "insert into shift (dateAndTime, manager, salesAmount) VALUES ('" . $_REQUEST['dateAndTime'] . 
  "','" . $_REQUEST['manager'] . "','" . $_REQUEST['salesAmount'] ."')";
echo $sql;


if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='listshifts.php'; </script>