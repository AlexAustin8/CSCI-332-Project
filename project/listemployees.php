<?php
include 'menu.php';
require_once 'dbconnect.php';
$sql = "select * from employees";
if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}
echo '<table border=1>';
echo '<tr><th>Name</th><th>Position</th><th>Wage</th><th>Age</th><th>Salary</th><th>Social Security Number</th><th>Actions</th></tr>';
while($row = $result->fetch_assoc()) {
  echo '<tr>';
  echo '<td>' . $row['name'] . '</td>';
  echo '<td>' . $row['position'] . '</td>';
  echo '<td>' . $row['wage'] . '</td>';
  echo '<td>' . $row['age'] . '</td>';
  echo '<td>' . $row['salary'] . '</td>';
  echo '<td>' . $row['ssn'] . '</td>';
  echo "<td><a href='edtempclt.php?name=" . $row['name'] . "&ssn=" . $row['ssn'] . "'>EDIT</a>" . ' ';
  echo "<a href='delempsrv.php?name=" . $row['name'] . "&ssn=" . $row['ssn'] . "'>DEL</a>" . '</td>';
  echo '</tr>';
}
echo '</table>';

?>
<a href='addempclt.php'>Add New</a>