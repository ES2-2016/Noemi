<?php
session_start();
$usuario = $_SESSION['usuario'];
$email = $_POST['InputEditarEmail'];
$cpf = $_POST['InputEditarCPF'];
$senha = MD5($_POST['InputEditarSenha']);
$_SESSION['usuario']= $usuario;
$_SESSION['senha']= $_POST['InputEditarSenha'];
$_SESSION['email']= $email;
$_SESSION['cpf']= $cpf;

define('BD_USER', 'root');
define('BD_PASS', 'mechamoluiz');
define('BD_NAME', 'Website');
$link = mysql_connect('localhost', BD_USER, BD_PASS);
mysql_select_db(BD_NAME);

$query = "UPDATE Usuarios SET email='$email',cpf='$cpf',senha='$senha' WHERE nome='$usuario';";
$insert = mysql_query($query);

if($insert){
  $message = "[Currículo Lattes] Atenção: Seus dados foram alterados em nosso website!";
  $message = wordwrap($message, 70);
  mail($email,"Currículo Lattes: Alteração de dados",$message);
  header("Location: http://localhost/paginausuario.php");
}else{
	echo mysql_errno($link) . ": " . mysql_error($link) . "\n";
}

?>