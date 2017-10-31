<?php
$mysqli = new mysqli('127.0.0.1', 'alexa846_t', 'aaaaa', 'alexa846_projecttest');

if ($mysqli->connect_errno) {
    echo "Errno: " . $mysqli->connect_errno . "</br>";
    echo "Error: " . $mysqli->connect_error . "</br>";
    exit;
}
?>
