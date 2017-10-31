<?php

require_once 'dbconnect.php';

$sql = "select * from employees where ssn='" . $_REQUEST['ssn'] . "'" ;

if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}
$row = $result->fetch_assoc();
?>

<form action='edtempsrv.php'>
name <input name="name" value="<?php echo $row['name']?>"></br>
position <input name="position" value="<?php echo $row['position']?>"></br>
wage <input name="wage" value="<?php echo $row['wage']?>"></br>
age <input name="age" value="<?php echo $row['age']?>"></br>
salary <input name="salary" value="<?php echo $row['salary']?>"></br>
<input type = "hidden" name="ssn" value="<?php echo $row['ssn']?>"></br>
<input type="submit" value="Save">
</form>