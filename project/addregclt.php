<form action='addregsrv.php'>
Student <select name="id">
<?php
require_once 'dbconnect.php';
$sql = "select * from students order by lastName,firstName";
if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}
while($row = $result->fetch_assoc()) {
  echo "<option value='" . $row['id'] . "'>" . $row['firstName'] . ' ' . $row['lastName'] . "</option>";
}
?>
</select>
</br>
Department <input name="depart"></br>
Number<input name="number"></br>
<input type="submit" value="Register">
</form>