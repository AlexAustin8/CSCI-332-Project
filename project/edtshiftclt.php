<?php

require_once 'dbconnect.php';

$sql = "select * from shift where dateAndTime='" . $_REQUEST['dateAndTime'] . "'";

if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}
$row = $result->fetch_assoc();
?>

<form action='edtshiftsrv.php'>
Date/Time<input name="dateAndTime" value="<?php echo $row['dateAndTime']?>"></br>
Manager<input name="manager" value="<?php echo $row['manager']?>"></br>
Sales Amount<input name="salesAmount" value="<?php echo $row['salesAmount']?>"></br>
<input type="submit" value="Save">
</form>