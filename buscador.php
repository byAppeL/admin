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
    <title>Buscador - Raspy</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <?php include "php/navbar.php"; ?>
    <h4 style="text-align: center";> Bienvenido <?php echo $_SESSION["username"]; ?> - Tu nivel de autorización es <?php echo $_SESSION["rangonumero"]; ?></h4>
   </head>
   <body>
		 <hr>
        <form role="form" name="buscador" action="" method="post">
          <div class="form-group">
             <label for="username-mail">Buscar Usuario</label>
						 <select name="seleccion">
							 <option value="bpornombre">Nombre</option>
							 <option value="bpornick" selected>Nick</option>
							 <option value="bporid">ID</option>
						 </select>
             <input type="text" class="form-control" id="username" name="username" placeholder="case sensitive" required>
          </div>
          <button type="submit" class="btn btn-default"> Buscar</button>
       </form>
<?php
    if(isset($_POST["username"])){
       if($_POST["username"] !=""){
          include "php/conexion.php";
          $buscar = $_POST["username"];
					$seleccion = $_POST["seleccion"];
					if($seleccion == 'bpornombre'){
				     $sql1= "SELECT ID, Nombre, Nick, Email FROM usuarios WHERE Nombre LIKE '%$buscar%'";
					}elseif($seleccion == 'bpornick'){
				     $sql1= "SELECT ID, Nombre, Nick, Email FROM usuarios WHERE Nick LIKE '%$buscar%'";
					}elseif($seleccion == 'bporid'){
				     $sql1= "SELECT ID, Nombre, Nick, Email FROM usuarios WHERE ID = '$buscar'";
					}
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
                   $strHTML.="(ID:".$row['ID'].") - ".$row['Nombre']." - ".$row['Nick']." - ".$row['Email']." - <a href='buscadorop.php?ID=".$row['ID']."'>Para obtener más información click aquí</a>.<br>";
               }
           }else{
               $strHTML="No se encontraron resultados para: $buscar<br>";
           }
           echo $strHTML;
        }
    }

?>
</html>
