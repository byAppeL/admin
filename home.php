<?php
session_start();
if(!isset($_SESSION["user_id"]) || $_SESSION["user_id"]==null){
	print "<script>window.location='login.php';</script>";
}
?>


<html>
 <div class="container">   
   <div class="content">
   <head>
       <style>
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

.disabled {
    opacity: 0.6;
    cursor: not-allowed;
}
</style>
    <title>Index- AlphaZoneRP</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <?php include "php/navbar.php"; ?>
    <h4 style="text-align: center";> Bienvenido <?php echo $_SESSION["username"]; ?> - Tu nivel de autorización es <?php echo $_SESSION["rangonumero"]; ?></h4>
   </head>
       
       
<body>
</body>
</div>
</div>     
</html>
