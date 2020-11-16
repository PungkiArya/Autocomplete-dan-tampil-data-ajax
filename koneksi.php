<?php
$DB_HOST = "localhost";
$DB_DATABASE = "pwpb";
$DB_USERNAME = "root";
$DB_PASSWORD = "12345";
$DB_PORT = "3306";

$db1 = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE, $DB_PORT);

if ($db1->connect_error) {
  die("Connection Failed:" .$db1->connect_error);

}
 ?>
