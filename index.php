<!DOCTYPE html>
<html>
<head>
<title> Hello World </title>
</head>
<body>

<h1>Bitte Name und Adresse ausfüllen und "Submit" klicken! </h1>

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
name=NULL;
adresse=NULL;
 	<form method="post" action="index.php">
		Name:<br>
		<input type="text" name="name">
		<br>
		Adresse:<br>
		<input type="text" name="adresse">
		<br>
		<input type="submit" name="save" value="submit">
	</form>
 
<?php
 if(isset($_POST['save']))
{	 
	 $name = $_POST['name'];
	 $adresse = $_POST['adresse'];
	 $sql = "INSERT INTO personal (name,adresse)
	 VALUES ('$name','$adresse')";
	 if (mysqli_query($mysqli, $sql)) {
		echo "Neuer Eintrag $name und $adresse erfolgreich gespeichert !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($mysqli);
	 }
	 //mysqli_close($mysqli);
}
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