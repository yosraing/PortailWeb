<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "portail";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 
if(isset($_POST['pic']))      $image=$_POST['pic'];
else      $image="";
if(isset($_POST['nomh']))      $nomP=$_POST['nomh'];
else      $nomP="";

if(isset($_POST['description']))      $desP=$_POST['description'];
else      $desP="";
if(isset($_POST['emplacement']))      $emp=$_POST['emplacement'];
else      $emp="";

if(isset($_POST['nbr']))      $nbr=$_POST['nbr'];
else      $nbr="";


if(isset($_POST['idP']))      $idp=$_POST['idP'];
else      $idp="";
 $filename=$_FILES['pic']['name'];  

 


$nom="images/".$filename;
 
$nom="images/".$filename;
$height='aA1`';
$value=preg_replace("/[^\`a-z,. \'\-\d]/i", "", $height);
$value=mysql_real_escape_string($nomP);
$value=mysql_real_escape_string($desP);
$value=mysql_real_escape_string($typeP);
 //print_r($image);
$sql = "INSERT INTO hotels(nbrEtoile,emplacement,nomHotel,imageHotel,description)VALUES ('$nbr', '$emp','$nomP','$nom','$desP')";

// on insere le tuple (mysql_query) et au cas où, on écrira un petit message d'erreur si la requête ne se passe pas bien (or die)
if ($conn->query($sql) === TRUE) {
    echo "Hotel ajouté";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// on ferme la connexion à la base
mysql_close();

echo"<center>";
echo"<FONT color='white'> Insertion reusite !</font>";
echo"<br>";

echo "<input type='button'  class='btn'  onclick= 'hello();' value='retour'>";

echo"</center>";

?>
