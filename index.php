<!DOCTYPE html>

<html>
<body>


<h1>Hello world </h1>

<?php

echo date("d.m.Y H:i:s");


// Parameters:

$host = "ssamariadbserver.mariadb.database.azure.com";
$user = "phpappuser@ssamariadbserver";
$password = "MySQLAzure2017";
$dbname = "reviews";
dbquery  = "select * from user_review";
// DB connect:


$mysqli = new mysqli($host, $user, $password, $dbname);
    if(!$mysqli)  {
        echo "<br>database error";
    }else{
        echo "<br>database connection successful";
    }

echo("<br><br>");

// DB Query:

if ($result = $mysqli -> query($dbquery)) {
  //echo "Returned rows are: " . $result -> num_rows . "\n";

  while ($row = $result->fetch_assoc()) {
    echo $row[name], ":\t\t", $row[message] . "\n";
  }


  $result -> free_result();
}

$mysqli->close();


?>

</body>
</html>