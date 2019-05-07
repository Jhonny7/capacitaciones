<?php
Class Connection{
/* Database connection start */
var $dbhost = "209.59.139.52";
var $username = "capaci39_juan";
var $password = "23deJulio08FER";
var $dbname = "capaci39_capacitaciones";
var $conn;
function getConnection() {
$con = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());
 
/* check connection */
if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
} else {
$this->conn = $con;
}
return $this->conn;
}
}
?>