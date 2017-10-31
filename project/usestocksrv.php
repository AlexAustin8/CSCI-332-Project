<?php
require_once 'dbconnect.php';

$sql = "insert into usedStock (name, amountUsed, date) VALUES ('" . $_REQUEST['name'] . 
  "','" . $_REQUEST['amountUsed'] . "','" . $_REQUEST['date'] ."')";
echo $sql;


if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='listshifts.php'; </script>