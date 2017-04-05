<?php 
include("dbconfig.php");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
 {
// emailPersonne and password received from loginform 
$emailPersonne=mysqli_real_escape_string($dbconfig,$_POST['emailPersonne']);
$password=mysqli_real_escape_string($dbconfig,$_POST['password']);


// pour les respensable de l'administrateur des hotels
$sql_query="SELECT idPersonne,idVisiteur FROM personne WHERE emailPersonne='$emailPersonne' and password='$password'";




$result=mysqli_query($dbconfig,$sql_query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$type=$row["idVisiteur"];
$count=mysqli_num_rows($result);


// If result matched $emailPersonne and $password, table row must be 1 row
if($count==1)
{
$_SESSION['login_user']=$emailPersonne;

if($type==1)

header("location: ../hotel.php");

else if($type==2)
header("location: ../Promotions/listePromotions.php");
}
else
{
$error="emailPersonne or Password is invalid";
}
}
?>
<!DOCTYPE html>
<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<meta charset="UTF-8">
<title>PHP login script tutorial - click4knowledge.com</title>
 <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="wrapper">
    <div class="container">
    <h1>Bienvenue</h1>
    <form method="post" action="" name="loginform">
    <input type="text" value="demo" placeholder="emailPersonne" id="username" name="emailPersonne" />
    <input type="password" value="demo" placeholder="Password" id="password" name="password" />
    <button type="submit">Submit</button>
    </form>
</div>
<ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
          <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>
</body>

</html>