<?php 
	session_start();
	session_destroy();
	unset ($_SESSION['usuario']);
	unset ($_SESSION['senha']);
	unset ($_SESSION['email']);
	unset ($_SESSION['cpf']);
	header("location:../index.php");
?>