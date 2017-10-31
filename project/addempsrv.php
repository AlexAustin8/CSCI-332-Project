<?php
require_once 'dbconnect.php';

$sql = "insert into employees (name,position,wage,age,salary,ssn) VALUES ('" . $_REQUEST['name'] . 
  "','" . $_REQUEST['position'] . "','" . $_REQUEST['wage'] . "','" . $_REQUEST['age'] . "','" . $_REQUEST['salary'] . "','" . $_REQUEST['ssn'] . "')";
echo $sql;


if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='listemployees.php'; </script>