<?php

$nome = $_POST['InputUsuario'];
$email = $_POST['InputEmail'];
$cpf = $_POST['InputCPF'];
$senha = MD5($_POST['InputSenha']);

define('BD_USER', 'root');
define('BD_PASS', 'mechamoluiz');
define('BD_NAME', 'Website');
mysql_connect('localhost', BD_USER, BD_PASS);
mysql_select_db(BD_NAME);

$query = "INSERT INTO Usuarios (nome,email,cpf,senha) VALUES ('$nome','$email','$cpf','$senha')";
$insert = mysql_query($query);

if($insert){
  header("Location: http://localhost/");
}else{
  echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário'); window.location.href='../index.php';</script>";
}

?>