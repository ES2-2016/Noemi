<?php

$nome = $_POST['InputInstituicao'];
$email = $_POST['InputEmailInstituicao'];
$cnpj = $_POST['InputCNPJ'];
$senha = 'Empty';

define('BD_USER', 'root');
define('BD_PASS', 'mechamoluiz');
define('BD_NAME', 'Website');
mysql_connect('localhost', BD_USER, BD_PASS);
mysql_select_db(BD_NAME);

$query = "INSERT INTO Instituicoes (nome,email,cnpj,senha) VALUES ('$nome','$email','$cnpj','$senha')";
$insert = mysql_query($query);

if($insert){
  header("Location: http://localhost/");
}else{
  echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário'); window.location.href='../index.html';'</script>";
}

?>

