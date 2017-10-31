<?php
require_once 'dbconnect.php';

$sql = "delete from shift where dateAndTime='" . $_REQUEST['dateAndTime'] . "'";
echo $sql;
if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='listshifts.php'; </script>