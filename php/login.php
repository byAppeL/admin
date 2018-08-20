<?php

if(!empty($_POST)){
	if(isset($_POST["username"]) &&isset($_POST["password"])){
		if($_POST["username"]!=""&&$_POST["password"]!=""){
			include "conexion.php";
			$user_id=null;
			$username=$_POST["username"];
			$sql1= "SELECT * FROM usuarios WHERE Nick = '".$_POST['username']."' AND Password = '".$_POST['password']."' ";
			$query = $con->query($sql1);
			while ($r=$query->fetch_array()) {
				$user_id=$r["ID"];
				$rangon=$r["Admin"];
				break;
			}
            if($rangon <= 5)
            {
                print "<script>alert(\"Acceso no autorizado.\");window.location='../index.php';</script>";
                exit;
            }
			if($user_id==null){
				print "<script>alert(\"Acceso invalido.\");window.location='../login.php';</script>";
			}else{
				session_start();
				$_SESSION["user_id"]=$user_id;
				$_SESSION["username"]=$username;
				$_SESSION["rangonumero"]=$rangon;
				print "<script>window.location='../home.php';</script>";
			}
		}
	}
}



?>
