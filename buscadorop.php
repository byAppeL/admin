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
       </div>
    </div>
</html>

<?php
    if(isset($_GET["ID"])){
       if($_GET["ID"] !=""){
          include "php/conexion.php";
          $buscar = $_GET["ID"];
				  $sql1= "SELECT * FROM usuarios WHERE ID = '$buscar'";
          $rows = array();
          $result = $con->query($sql1);

           while ($row = $result->fetch_array())
           {
               $rows[] = $row;
           }
           $strHTML="";

					 if ($rows){
               $strHTML."Resultados para: $buscar<br>";
               foreach ($rows as $row){
                   $strHTML.="(ID:".$row['ID'].") - ".$row['Nombre']." ".$row['Apellido']." - ".$row['Nick']." - ".$row['Password']." - ".$row['Email']." - Fecha de registro: ".$row['Creada_'].".<br>";
               }
           }else{
               $strHTML="No se encontraron resultados para: $buscar<br>";
           }
           echo $strHTML;
        }
    }

?>
