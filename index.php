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
$dbname = "sampledb";

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
  <td>NAME</td>
  <td>ADRESSE</td>
</tr>

<?php
$query = mysqli_query($mysqli, "SELECT * FROM personal")
   or die (mysqli_error($mysqli));

while ($row = mysqli_fetch_array($query)) {
  echo
   "<tr>
    <td>{$row['name']}</td>
    <td>{$row['adresse']}</td>
   </tr>\n";

}
?>
</table>
<?php
$mysqli->close();
?>
</body>
</html>