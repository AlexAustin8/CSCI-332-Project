<?php

require_once 'dbconnect.php';

$sql = "select * from stock where name=" . $_REQUEST['name'];

if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}
$row = $result->fetch_assoc();
?>

<form action='edtstocksrv.php'>
Type<input name="type" value="<?php echo $row['type']?>">
Name<input name="name" value="<?php echo $row['name']?>"></br>
Cost Per Unit<input name="costPerUnit" value="<?php echo $row['costPerUnit']?>"></br>
Current Stock<input name="currentStock" value="<?php echo $row['currentStock']?>"></br>
<input type="submit" value="Save">
</form>