<?php
require_once 'dbconnect.php';

$sql = "delete from employees where ssn='" . $_REQUEST['ssn'] . "'";
if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='listemployees.php'; </script>