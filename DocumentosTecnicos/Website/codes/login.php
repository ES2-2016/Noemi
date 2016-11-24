<?php
session_start();

$usuario = $_POST['LoginUsuario'];
$senha = MD5($_POST['LoginSenha']);

define('BD_USER', 'root');
define('BD_PASS', 'mechamoluiz');
define('BD_NAME', 'Website');
mysql_connect('localhost', BD_USER, BD_PASS);
mysql_select_db(BD_NAME);

$query = "SELECT * FROM Usuarios WHERE nome = '$usuario' AND senha = '$senha'";
$insert = mysql_query($query);

while($row = mysql_fetch_assoc($insert)) {
		$email = $row["email"];
		$cpf = $row["cpf"];
} 

if (mysql_num_rows($insert) > 0){
		session_start();
		$_SESSION['usuario']= $usuario;
		$_SESSION['senha']= $_POST['LoginSenha'];
		$_SESSION['email']= $email;
		$_SESSION['cpf']= $cpf;

	    setcookie("login",$usuario);
        header("Location: ../paginausuario.php");
} else{
		session_destroy();
		unset ($_SESSION['usuario']);
		unset ($_SESSION['senha']);
		unset ($_SESSION['email']);
		unset ($_SESSION['cpf']);

		header("location:../index.php");
}

?>