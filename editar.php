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
    <title>Index- AlphaZoneRP</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <?php include "php/navbar.php"; ?>
    <h4 style="text-align: center";> Bienvenido <?php echo $_SESSION["username"]; ?> - Tu nivel de autorización es <?php echo $_SESSION["rangonumero"]; ?></h4>
   </head>
   <body>
        <form role="form" name="editor" action="" method="post">
          <div class="form-group">
             <label for="username-mail">ID del usuario</label>
             <input type="text" class="form-control" id="iduser" name="iduser" placeholder="ID del Usuario" required>
						 <select name="seleccion">
             <?php
						 include "php/conexion.php";
						 $sql2 = "SHOW FIELDS FROM usuarios";
						 $result2 = $con->query($sql2);
						 while($row2 = $result2->fetch_array()){
							 ?>
							 <option value="<?php echo $row2[0]; ?> "><?php echo $row2[0]; ?></option>
							 <?php
						 } ?>
						 </select>
          </div>
          <button type="submit" class="btn btn-default"> Buscar</button>
       </form>
   </body>
   </div>
 </div>
 <?php

if(!empty($_POST)){
    if(isset($_POST["iduser"])){
       if($_POST["iduser"] !=""){
          include "php/conexion.php";
          $editar = $_POST["iduser"];
					$seleccion = $_POST["seleccion"];
          $rows = array();
					$sql1= "SELECT '".$_POST["seleccion"]."' FROM usuarios WHERE ID = '".$_POST["iduser"]."'";
          $result = $con->query($sql1);

           $strHTML="";

           while ($row = $result->fetch_array())
           {
               $strHTML.="".$row[$seleccion]."";
           }

           echo $strHTML;
        }
    }
}
?>
</html>
