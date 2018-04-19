<?php
include_once("./library.php"); // To connect to the database
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
// Form the SQL query (an INSERT query)
   $sql="INSERT INTO UserAccounts (username, password, email)
   VALUES
   ('$_POST[username]','$_POST[password]','$_POST[email]')";
if (!mysqli_query($con,$sql))
  {
    die('Error: ' . mysqli_error($con));
  }

  $sql2="CREATE TABLE $_POST[username] (due VARCHAR(50) NOT NULL, task VARCHAR(300) NOT NULL)";
if (!mysqli_query($con,$sql2))
  {
    die('Error: ' . mysqli_error($con));
  }
redirect('http://192.168.64.3/TimeSavvy/index.php');
mysqli_close($con);

function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}
?>