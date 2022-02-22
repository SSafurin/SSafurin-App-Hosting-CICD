<!DOCTYPE html>
<html>
<head>
<title> Hello World </title>
</head>
<body>

<h1>Welcome </h1>

<?php

echo date("d.m.Y H:i:s");


// Parameters:

$host = "ssamariadbserver.mariadb.database.azure.com";
$user = "siman@ssamariadbserver";
$password = "Moiyan26?";
$dbname = "reviews";

// DB connect:

$mysqli = new mysqli($host, $user, $password, $dbname);
    if(!$mysqli)  {
        echo "<br>database error";
    }else{
        echo "<br>database connection successful";
    }

echo("<br><br>");
?>

<table border="1" align="center">
<tr>
  <td>Reviewer Name</td>
  <td>Stars</td>
  <td>Details</td>
</tr>

<?php
$query = mysqli_query($mysqli, "SELECT * FROM user_review")
   or die (mysqli_error($mysqli));

while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['reviewer_name']}</td>
    <td>{$row['star_rating']}</td>
    <td>{$row['details']}</td>
   </tr>\n";

}
?>
</table>
<?php
$mysqli->close();
?>
</body>
</html>