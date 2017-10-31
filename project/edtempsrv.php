<?php
require_once 'dbconnect.php';

$sql = "update employees set name = '" . $_REQUEST['name'] . 
  "',position='" . $_REQUEST['position'] . "',wage='" . $_REQUEST['wage'] .
   "',age='" . $_REQUEST['age'] ."',salary='" 
   . $_REQUEST['salary'] . "' where ssn='" . $_REQUEST['ssn']  . "'";

echo $sql;

if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='listemployees.php'; </script>