<?php

if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["nombre"]) &&isset($_POST["apellido"]) &&isset($_POST["email"]) &&isset($_POST["password"]) &&isset($_POST["confirm_password"])){
			include "conexion.php";

			$found=false;
			$sql1= "select * from usuarios where Nick=\"$_POST[username]\" or Email=\"$_POST[email]\"";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
				$found=true;
				break;
			}
			if($found){
				print "<script>alert(\"Nombre de usuario o email ya estan registrados.\");window.location='../registro.php';</script>";
			}
			$sql = "insert into usuarios (Nick, Password, Nombre, Apellido, Email, Admin, Creada_) values (\"$_POST[username]\",\"$_POST[password]\",\"$_POST[nombre]\",\"$_POST[apellido]\",\"$_POST[email]\", 0, NOW())";
			$query = $con->query($sql);
			if($query!=null){
				print "<script>alert(\"Registro exitoso. Proceda a logearse\");window.location='../login.php';</script>";
			}
			else{
				print "<script>alert(\"Registro erroneo.\");window.location='../registro.php';</script>";
			}
	}
}



?>
