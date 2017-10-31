<?php
require_once 'dbconnect.php';

$sql = "delete from stock where name='" . $_REQUEST['name'] . "' and type='" . $_REQUEST['type'] . "'";
echo $sql;
if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='liststock.php'; </script>