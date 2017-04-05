<style>
#login_form
{
position: absolute; top: 250px; left: 0px;
}
span
{
position: absolute; top: 350px; left: 0px;
}
#an 
{
position: absolute; top: 375px; left: 0px;
}

</style>

<?php
session_start(); // dfs
?>
<!DOCTYPE html>
  <html>
    <head>
   
    <meta charset="UTF-8" />
<!-- ajouté pour le login-->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="../../js/index.js"></script>
     <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style2.css">
    </head>
    
    <body>
    <noscript>
<meta http-equiv="refresh" content="0;URL=./script/no-js.htm">
</noscript>
    <script type="text/javascript">
    </script>
    <div id="login_form">

    <form class="login" method="post" action="./script/login.php">
   <fieldset>
    
    <legend class="legend">Login</legend>
    
    <div class="input">
        <input type="text" name="pseudo" id="pseudo" type="text" required  />
      <span><i class="fa fa-envelope-o"></i></span>
    </div>
    
    <div class="input">
        <input type="password" name="password" placeholder="****" maxlength="255" size="35" required />
      <span><i class="fa fa-lock"></i></span>
    </div>
    
    <button type="submit"  alt="Submit" title="Submit" class="submit"><i class="fa fa-long-arrow-right"></i></button>
   <br>
    <a href="./anonymeChat/script/login.php" > Version anonyme</a>
    <br>
    <a href="inscription.html" > S'inscrire</a>
  </fieldset>
  
  <div class="feedback">
    login successful <br />
    redirecting...
  </div>
  
    </form>
    </div>

  