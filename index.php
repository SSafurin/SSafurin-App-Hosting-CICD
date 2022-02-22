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
$user = "phpappuser@ssamariadbserver";
$password = "MySQLAzure2017";
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

$name=$_POST['name'];
$adresse=$_POST['adresse'];
$userQuery="INSERT INTO personal (name, adresse) VALUES ('$name', '$adresse')";
$result= mysqli_query($mysqli,$userQuery);

if(!$result)
{
die("fehlerhaft ($userQuery) from $dbname:" .
mysqli_error($mysqli));
}
else
{
print("<h1> Einfügen eine neue Person </h1>");
print("<p> Folgende Person wurde hinzugefügt: </p>");
print("<table border='0'>
      <tr><td>Name</td><td>$name</td></tr>
      <tr><td>Name</td><td>$adresse</td></tr>
      </table>");
}


?>
</table>
<?php
$mysqli->close();
?>
</body>
</html>