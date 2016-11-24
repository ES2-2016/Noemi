<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Currículo Lattes</title>

    <!-- CSS -->
    <link rel="icon" href="favicon.ico">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="fonts/FontAwesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/jquery.modal.css" type="text/css" media="screen" />

    <!-- Javascript -->
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.modal.js" type="text/javascript" charset="utf-8"></script>
  </head>

  <body>

	<script>
	function formatar(mascara, documento){
	  var valor = documento.value.length;
	  var saida = mascara.substring(0,1);
	  var string = mascara.substring(valor)
	  
	  if (string.substring(0,1) != saida){
	            documento.value += string.substring(0,1);
	  }  
	}
	</script>

    <!-- NAVBAR -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        <!-- LOGIN -->
          <form class="navbar-form navbar-right" method="POST" action="codes/login.php">
          <i class="fa fa-user-o fa" style="color: white; margin-top: 5px;" aria-hidden="true"></i>
            <div class="form-group">
              <input type="text" placeholder="Usuário" class="form-control"  name="LoginUsuario" id="LoginUsuario">
            </div>
            <i class="fa fa-unlock-alt fa" style="color: white;" aria-hidden="true"></i>
            <div class="form-group">
              <input type="password" placeholder="Senha" class="form-control" name="LoginSenha" id="LoginSenha">
            </div>
            <button type="submit" class="btn btn-success">Acessar</button>
          </form>
        </div>
      </div>
    </nav>


    <!-- CONTAINER -->
    <div class="jumbotron">
      <div class="container">
        <h1>Currículo Lattes</h1>
        <p>Nossa plataforma integra as bases de dados de currículos, grupos de pesquisa e instituições, em um único sistema de informações, de todas as áreas de ciência atuando em todo país.</p>
        <p><a class="btn btn-primary btn-lg cadastro-curriculo" href="#curriculo" rel="modal:open" style="width:280px;">Cadastrar meu currículo  <i class="fa fa-graduation-cap" aria-hidden="true"></i></a></p>

    <!-- MODAL CURRÍCULO -->
		<form class="registrar-curriculo modal" id="curriculo" style="display:none; 
		background: -webkit-gradient(linear,left bottom,left top,color-stop(0, #eee),color-stop(1, #fff));" method="POST" action="codes/cadastrousuarios.php">
			<div class="form-group">
			  	<label for="InputUsuario">Usuário</label>
			  	<div class="input-group">
			  	<div class="input-group-addon"><i class="fa fa-user-circle" aria-hidden="true"></i></div>
				<input type="text" class="form-control" required="required" name="InputUsuario" id="InputUsuario" placeholder="Escolha um nome de usuário bem legal!">
				</div>
			</div>
			<div class="form-group">
			  	<label for="InputEmail">E-mail</label>
			  	<div class="input-group">
			  	<div class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
				<input type="email" class="form-control" required="required" name="InputEmail" id="InputEmail" placeholder="Qual é o seu e-mail?">
				</div>
				<small id="emailHelp" class="form-text text-muted">Nós não divulgaremos seu e-mail para ninguém.</small>
			</div>
			<div class="form-group">
			  	<label for="InputCPF">CPF</label>
			  	<div class="input-group">
			  	<div class="input-group-addon"><i class="fa fa-id-card-o" aria-hidden="true"></i></div>
				<input type="text" class="form-control" required="required" name="InputCPF" id="InputCPF" OnKeyPress="formatar('###.###.###-##', this)" placeholder="000.000.000-00" >
				</div>
			</div>
			<div class="form-group">
			  	<label for="InputSenha">Senha</label>
			  	<div class="input-group">
			  	<div class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></div>
				<input type="password" class="form-control" required="required" name="InputSenha" id="InputSenha" placeholder="Qual senha você deseja?">
				</div>
			</div>
			<div class="form-actions" style="margin: 0; background-color: transparent; text-align: center;">
				<input class="btn btn-warning btn-lg submeter-curriculo" style="width:280px;" type="submit" value="Registrar">
			</div>
		</form>

        <p><a class="btn btn-danger btn-lg" href="#instituicao" rel="modal:open" style="width:280px;">Cadastrar minha instituição <i class="fa fa-university" aria-hidden="true"></i></a></p>

    <!-- MODAL INSTITUIÇÃO -->
        <form class="registrar-instituicao modal" id="instituicao" style="display:none; 
		background: -webkit-gradient(linear,left bottom,left top,color-stop(0, #eee),color-stop(1, #fff));" method="POST" action="codes/cadastroinstituicao.php">
			<div class="form-group">
			  	<label for="InputInstituicao">Nome</label>
			  	<div class="input-group">
			  	<div class="input-group-addon"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></div>
				<input type="text" class="form-control" required="required" name="InputInstituicao" id="InputInstituicao" placeholder="Qual é o nome da instituição?">
				</div>
			</div>
			<div class="form-group">
			  	<label for="InputEmailInstituicao">E-mail</label>
			  	<div class="input-group">
			  	<div class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
				<input type="email" class="form-control" required="required" name="InputEmailInstituicao" id="InputEmailInstituicao" placeholder="Qual é o e-mail da instituição?">
				</div>
				<small id="emailHelp" class="form-text text-muted">Nós não divulgaremos seu e-mail para ninguém.</small>
			</div>
			<div class="form-group">
			  	<label for="InputCNPJ">CNPJ</label>
			  	<div class="input-group">
			  	<div class="input-group-addon"><i class="fa fa-id-card-o" aria-hidden="true"></i></div>
				<input type="text" class="form-control" required="required" name="InputCNPJ" id="InputCNPJ" OnKeyPress="formatar('##.###.###/####-##', this)" placeholder="00.000.000/0000-00" >
				</div>
			</div>
			<div class="form-actions" style="margin: 0; background-color: transparent; text-align: center;">
				<input class="btn btn-warning btn-lg submeter-curriculo" style="width:280px;" type="submit" value="Registrar">
			</div>
		</form>

      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h2>Aluno</h2>
          <h4>Felipe Fronchetti</h4>
          <p>Aluno do curso de Bacharelado em Ciência da Computação pela Universidade Tecnológica Federal do Paraná. Desenvolvedor de dispositivos móveis e páginas web.</p>
        </div>
        <div class="col-md-4">
          <h2>Professor</h2>
          <h4>Reginaldo Ré</h4>
          <p>Possui graduação em Bacharelado em Ciência da Computação pela Universidade do Oeste Paulista, mestrado em Ciências da Computação e Matemática Computacional pela Universidade de São Paulo e doutorado em Ciência da Computação e Matemática Computacional.</p>
       </div>
        <div class="col-md-4">
          <h2>Matéria</h2>
          <h4>Engenharia de Software</h4>
          <p>Engenharia de Software é uma área da computação voltada à especificação, desenvolvimento, manutenção e criação de sistemas de software, com aplicação de tecnologias e práticas de gerência de projetos e outras disciplinas, visando organização, produtividade e qualidade.</p>
        </div>
      </div>

      <footer>
        <p>&copy; 2016 Company, Inc.</p>
      </footer>
    </div> 



    <!--[if lt IE 10]>
        <script src="assets/js/placeholder.js"></script>
    <![endif]-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
