<?php
include 'menu.php';
require_once 'dbconnect.php';
$sql = "select * from shift";
if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}
echo '<table border=1>';
echo '<tr><th>Date/Time</th><th>Manager</th><th>Sales Amount</th><th>Actions</th></tr>';
while($row = $result->fetch_assoc()) {
  echo '<tr>';
  echo '<td>' . $row['dateAndTime'] . '</td>';
  echo '<td>' . $row['manager'] . '</td>';
  echo '<td>' . $row['salesAmount'] . '</td>';
  echo "<td><a href='edtshiftclt.php?dateAndTime=" . $row['dateAndTime'] . "'>EDIT</a>" . ' ';
  echo "<a href='delshiftsrv.php?dateAndTime=" . $row['dateAndTime'] . "'>DEL</a>" . ' ';
  echo "<a href='addlaborclt.php?date=" . $row['dateAndTime'] . "'>Add Employee Hours</a>" . ' ';
  echo "<a href='usestockclt.php?date=" . $row['dateAndTime'] . "'>Enter Used Stock</a>" . '</td>';

  echo '</tr>';
}
echo '</table>';

?>
<a href='addshiftclt.php'>Add New</a>