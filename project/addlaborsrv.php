<?php
require_once 'dbconnect.php';

$sql = "insert into labor(date,employee,hoursWorked) VALUES ('" . $_REQUEST['date'] . 
  "','" . $_REQUEST['employee'] . "','" . $_REQUEST['hoursWorked'] . "')";
echo $sql;
if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='listshifts.php'; </script>