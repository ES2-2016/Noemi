<?php
 session_start();
$usuario = $_SESSION['usuario'];

define('BD_USER', 'root');
define('BD_PASS', 'mechamoluiz');
define('BD_NAME', 'Website');
$link = mysql_connect('localhost', BD_USER, BD_PASS);
mysql_select_db(BD_NAME);

$query = "DELETE FROM Usuarios WHERE nome='$usuario';";
$insert = mysql_query($query);

if($insert){
	session_start();
	session_destroy();
	unset ($_SESSION['usuario']);
	unset ($_SESSION['senha']);
	unset ($_SESSION['email']);
	unset ($_SESSION['cpf']);
	header("location:../index.php");
}else{
	echo mysql_errno($link) . ": " . mysql_error($link) . "\n";
}

?>