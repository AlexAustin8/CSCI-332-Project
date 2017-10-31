<?php
require_once 'dbconnect.php';

$sql = "call register(" . $_REQUEST['id'] . 
  ",'" . $_REQUEST['depart'] . "'," . $_REQUEST['number'] . ",@status)";

if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

$sql = "Select @status status";
if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}
$row = $result->fetch_assoc();
echo $row['status'];
?>
