<?php
	require 'conexion.php';
	if(isset($_POST['login'])) {
		$errMsg = '';
		// Get data from FORM
		$username = $_POST['username'];
		$password = $_POST['password'];
		if($username == '')
			$errMsg = 'Enter username';
		if($password == '')
			$errMsg = 'Enter password';
		if($errMsg == '') {
			try {
				$stmt = $connect->prepare('SELECT * FROM usuarios WHERE Nick = :username AND Password = :password');
				$stmt->execute(array(
					':username' => $username , ':password'=> $password
					));
				$data = $stmt->fetch();
				if($data == false){
					$errMsg = "User $username not found.";
				}
				else {
					if($password == $data['password']) {
						$_SESSION['name'] = $data['Nombre'];
						$_SESSION['username'] = $data['Nick'];
						$_SESSION['password'] = $data['password'];
						header('Location: dashboard.php');
						exit;
					}
					else
						$errMsg = 'Password not match.';
				}
			}
			catch(PDOException $e) {
				$errMsg = $e->getMessage();
			}
		}
	}
?>
