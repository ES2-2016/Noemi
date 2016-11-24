<?php
session_start();

$usuario = $_SESSION['usuario'];
$plataforma = $_POST['InputPlataforma'];
$url = $_POST['InputURL'];

define('BD_USER', 'root');
define('BD_PASS', 'mechamoluiz');
define('BD_NAME', 'Website');
mysql_connect('localhost', BD_USER, BD_PASS);
mysql_select_db(BD_NAME);

$query = "INSERT INTO Plataformas (usuario,plataforma,url) VALUES ('$usuario','$plataforma','$url')";
$insert = mysql_query($query);

if($insert){
  header("Location: http://localhost/paginausuario.php");
}else{
  echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário'); window.location.href='../index.html';'</script>";
}

?>

