<?php
require_once('./library.php');
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno()) {
  echo("Can't connect to MySQL Server. Error code: " .
       mysqli_connect_error());
  return null;
}
// Form the SQL query (a SELECT query)
$sql="SELECT username, password, email FROM UserAccounts WHERE username='$_POST[username]' AND password='$_POST[password]'";
$result = mysqli_query($con,$sql);

$row = mysqli_fetch_array($result);
if (empty($row)) {
	redirect('http://localhost:8080/webprj/TimeSavvy.jsp');
}
else {
	redirect('http://192.168.64.3/TimeSavvy/index.php');
}

mysqli_close($con);



function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}
?>