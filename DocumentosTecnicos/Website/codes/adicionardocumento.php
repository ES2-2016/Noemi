<?php
header('Content-Type: text/html; charset=utf-8');

session_start();

$usuario = $_SESSION['usuario'];
$titulo = $_POST['InputTituloDocumento'];
$texto = htmlspecialchars($_POST['InputDocumentoTexto']);

define('BD_USER', 'root');
define('BD_PASS', 'mechamoluiz');
define('BD_NAME', 'Website');
$link = mysql_connect('localhost', BD_USER, BD_PASS);
mysql_select_db(BD_NAME);
mysql_set_charset('utf8', $link);

$query = "INSERT INTO Documentos (usuario,titulo,texto) VALUES ('$usuario','$titulo','$texto')";
$insert = mysql_query($query);

if($insert){
  header("Location: http://localhost/paginausuario.php");
}else{
  echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário'); window.location.href='../index.html';'</script>";
}

?>

