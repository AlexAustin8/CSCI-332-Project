<?php
include 'menu.php';
require_once 'dbconnect.php';
$sql = "select * from stock";
if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}
echo '<table border=1>';
echo '<tr><th>Type</th><th>Name</th><th>Cost Per Unit</th><th>Current Stock</th><th>Actions</th></tr>';
while($row = $result->fetch_assoc()) {
  echo '<tr>';
  echo '<td>' . $row['type'] . '</td>';
  echo '<td>' . $row['name'] . '</td>';
  echo '<td>' . $row['costPerUnit'] . '</td>';
  echo '<td>' . $row['currentStock'] . '</td>';
  echo "<td><a href='edtstockclt.php?name=" . $row['name'] . "&type=" . $row['type'] . "'>EDIT</a>" . ' ';
                                                                         
  echo "<a href='delstocksrv.php?name=" . $row['name'] . "&type=" . $row['type'] . "'>DEL</a>" . '</td>';

  echo '</tr>';
}
echo '</table>';

?>
<a href='addstockclt.php'>Add New</a>