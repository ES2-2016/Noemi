<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Página Usuário</title>
    <link rel="stylesheet" href="fonts/FontAwesome/css/font-awesome.min.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/bootstrap-select.css" rel="stylesheet">
    <link href="assets/css/paginausuario.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/jquery.modal.css" type="text/css" media="screen" />

    <script src="./assets/js/bootstrap-select.js"></script>
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/jquery.modal.js" type="text/javascript" charset="utf-8"></script>
    <script src="//cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
  </head>

  <body>

  <style type="text/css">
        .notes
        {
            background-image: -webkit-linear-gradient(left, white 10px, transparent 10px), -webkit-linear-gradient(right, white 10px, transparent 10px), -webkit-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
            background-image: -moz-linear-gradient(left, white 10px, transparent 10px), -moz-linear-gradient(right, white 10px, transparent 10px), -moz-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
            background-image: -ms-linear-gradient(left, white 10px, transparent 10px), -ms-linear-gradient(right, white 10px, transparent 10px), -ms-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
            background-image: -o-linear-gradient(left, white 10px, transparent 10px), -o-linear-gradient(right, white 10px, transparent 10px), -o-linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
            background-image: linear-gradient(left, white 10px, transparent 10px), linear-gradient(right, white 10px, transparent 10px), linear-gradient(white 30px, #ccc 30px, #ccc 31px, white 31px);
            background-size: 100% 100%, 100% 100%, 100% 31px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
            line-height: 31px;
            font-family: Arial, Helvetica, Sans-serif;
            padding: 8px;
            width:300px;
            height:500px;
        }
        .notes:focus
        {
            outline: none;
        }
   </style>

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

  <?php
  	header('Content-Type: text/html; charset=utf-8');

    session_start();

    if((!isset ($_SESSION['usuario'])))
    {
        session_destroy();
        unset($_SESSION['usuario']);
        unset ($_SESSION['senha']);
        unset ($_SESSION['email']);
        unset ($_SESSION['cpf']);
        header('location:index.php');
    }
  ?>
 

    <nav class="navbar navbar-dark navbar-fixed-top" style="background:black;">
      <div class="container">
        <a class="navbar-brand" href="#" style="font-weight: bold; color:white;">Currículo Lattes</a>
          <form class="navbar-form navbar-right" method="POST" action="codes/sair.php" style="padding-left: 1px; padding-right: 1px;">
            <button type="submit" class="btn btn-danger">Sair</button>
          </form>
          <form class="navbar-form navbar-right" method="POST" action="codes/pesquisar.php">
            <div class="form-group">
              <input type="text" placeholder="Encontrar currículos" class="form-control"  name="PesquisarCurriculo" id="PesquisarCurriculo">
            </div>
            <button type="submit" class="btn btn-primary">Pesquisar</button>
          </form>
      </div>
    </nav>

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="float-xs-right hidden-sm-up">
        <a type="button" class="btn btn-success btn-medium" href="#alterarcurriculo" rel="modal:open">Alterar dados cadastrais <i class="fa fa-cogs" aria-hidden="true"></i></a>
        <a type="button" class="btn btn-warning btn-medium" href="#adicionardocumento" rel="modal:open">Adicionar documentos <i class="fa fa-file-text-o" aria-hidden="true"></i></a>
        <a type="button" class="btn btn-danger btn-medium" href="#importardados" rel="modal:open">Importar dados <i class="fa fa-cloud-download" aria-hidden="true"></i></a>
        <a href="https://github.com/LLVN" class="btn btn-info btn-medium">Visitar GitHub <i class="fa fa-github" aria-hidden="true"></i></a>

    <!-- JUMBOTRON -->
      <div class="jumbotron">
        <h2 style="font-weight:bold;">Minha Página </h2>
        <p>Olá <?php echo '<b>' . $_SESSION['usuario'] . '</b>'; ?>! Você se encontra em sua página principal. Aqui você consegue alterar dados cadastrais, importar dados de outras plataformas e inserir documentos com suas descrições.</p>
      </div>

    <!-- MODAL ALTERAR CURRÍCULO -->
        <form class="alterar-curriculo modal" id="alterarcurriculo" style="display:none; 
        background: -webkit-gradient(linear,left bottom,left top,color-stop(0, #eee),color-stop(1, #fff));" method="POST" action="codes/editarcadastro.php">
        <h3>Alterar dados</h3>
            <div class="form-group">
                <label for="InputEditarEmail">E-mail</label>
                <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                <input type="email" class="form-control" required="required" name="InputEditarEmail" id="InputEmail" value="<?php echo $_SESSION['email']; ?>"placeholder="Qual é o seu e-mail?">
                </div>
                <small id="emailHelp" class="form-text text-muted">Nós não divulgaremos seu e-mail para ninguém.</small>
            </div>
            <div class="form-group">
                <label for="InputEditarCPF">CPF</label>
                <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-id-card-o" aria-hidden="true"></i></div>
                <input type="text" class="form-control" required="required" name="InputEditarCPF" id="InputCPF" value="<?php echo $_SESSION['cpf']; ?>" OnKeyPress="formatar('###.###.###-##', this)" placeholder="000.000.000-00" >
                </div>
            </div>
            <div class="form-group">
                <label for="InputEditarSenha">Senha</label>
                <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></div>
                <input type="password" class="form-control" required="required" name="InputEditarSenha" id="InputSenha" value="<?php echo $_SESSION['senha']; ?>" placeholder="Qual senha você deseja?">
                </div>
                <small id="passwordHelp" class="form-text text-muted">Se você não modificar este campo, sua senha continuará a mesma.</small>
            </div>
            <div class="form-actions" style="margin: 0; background-color: transparent; text-align: center;">
                <input class="btn btn-warning btn-lg submeter-curriculo" style="width:280px;" type="submit" value="Editar">
            </div>
        </form>


     <!-- MODAL IMPORTAR DADOS -->
        <form class="importar-dados modal" id="importardados" style="display:none; 
        background: -webkit-gradient(linear,left bottom,left top,color-stop(0, #eee),color-stop(1, #fff));" method="POST" action="codes/adicionarimportacao.php">
        <h3>Importar</h3>
            <div class="form-group">
                <div class="input-group">
                   <label>Qual plataforma você deseja importar?</label>
                    <select name="InputPlataforma" class="InputPlataforma">
                          <option value="Github">Github</option>
                          <option value="Twitter">Twitter</option>
                          <option value="Facebook">Facebook</option>
                          <option value="Stack Overflow">Stack Overflow</option>
                    </select>
                </div>
                <div class="input-group">
                    <div class="input-group-addon">URL</div>
                    <input type="text" class="form-control" required="required" name="InputURL" id="InputURL">

                </div>
            </div>
            <div class="form-actions" style="margin: 0; background-color: transparent; text-align: center;">
                <input class="btn btn-warning btn-lg adicionar-plataforma" style="width:280px;" type="submit" value="Importar">
            </div>
        </form>

     <!-- MODAL ADICIONAR DOCUMENTOS -->
        <form class="adicionar-documento modal" id="adicionardocumento" style="display:none; 
        background: -webkit-gradient(linear,left bottom,left top,color-stop(0, #eee),color-stop(1, #fff));" method="POST" action="codes/adicionardocumento.php">
        <h3>Adicionar</h3>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Título</div>
                    <input type="text" class="form-control" required="required" name="InputTituloDocumento" id="InputTituloDocumento">
                </div>
                <div class="input-group">
                    </br>
                    <textarea class="notes" name="InputDocumentoTexto" id="InputDocumentoTexto" rows="10" style="width: 440px;" ></textarea>
                </div>
            </div>
            <div class="form-actions" style="margin: 0; background-color: transparent; text-align: center;">
                <input class="btn btn-warning btn-lg adicionar-plataforma" style="width:280px;" type="submit" value="Adicionar">
            </div>
        </form>

        <?php
                $usuario = $_SESSION['usuario'];
                $link = mysql_connect('localhost', 'root', 'mechamoluiz');
                mysql_set_charset('utf8', $link);

                mysql_select_db('Website');
                $query = "SELECT * FROM Documentos WHERE usuario ='$usuario'";
                $insert = mysql_query($query);
                $colorarray = array('success','info','warning','danger');
                $i = 0;

                while ($row = mysql_fetch_array($insert)) {
                    if($i == 4){
                        $i = 0;
                    }
                    $thiscolor = $colorarray[$i];
                    $thistitulo = $row['titulo'];
                    $thistexto = $row['texto'];
                    echo "<div class='panel panel-". $thiscolor . "'>";
                    echo "<div class='panel-heading'>" . $thistitulo . "</div>";
                    echo "<div class='panel-body'>" . $thistexto . "</div>";
                    echo "</div>";
                    $i = $i + 1;
                }
            ?>
        </div><!--/span-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <a href="#" class="list-group-item active">Minhas plataformas</a>
            <?php
                function addScheme($url, $scheme = 'http://')
                {
                    return parse_url($url, PHP_URL_SCHEME) === null ?
                    $scheme . $url : $url;
                }

                function containsSubstring($substring, $string)
                {
                    return strpos($substring, $string) !== false;
                }

                $usuario = $_SESSION['usuario'];
                /* Informações do Banco de Dados*/
                define('BD_USER', 'root');
                define('BD_PASS', 'mechamoluiz');
                define('BD_NAME', 'Website');
                $link = mysql_connect('localhost', BD_USER, BD_PASS);
                mysql_select_db(BD_NAME);
                mysql_set_charset('utf8', $link);

                $query = "SELECT * FROM Plataformas WHERE usuario ='$usuario'";
                $insert = mysql_query($query);


                while ($row = mysql_fetch_array($insert)) {
                    $thisurl = addScheme($row['url']);
                    $thisplataforma = $row['plataforma'];

                    if (containsSubstring('Github',$thisplataforma)){
                         echo "<a href=". $thisurl ." class='list-group-item'><i class='fa fa-github fa-lg' aria-hidden='true'></i> " . $thisplataforma . "</a>";
                    }

                    if (containsSubstring('Twitter',$thisplataforma)){
                         echo "<a href=". $thisurl ." class='list-group-item'><i class='fa fa-twitter fa-lg' aria-hidden='true'></i> " . $thisplataforma . "</a>";
                    }

                    if (containsSubstring('Facebook',$thisplataforma)){
                         echo "<a href=". $thisurl ." class='list-group-item'><i class='fa fa-facebook fa-lg' aria-hidden='true'></i> " . $thisplataforma . "</a>";
                    }

                    if (containsSubstring('Stack Overflow',$thisplataforma)){
                         echo "<a href=". $thisurl ." class='list-group-item'><i class='fa fa-stack-overflow fa-lg' aria-hidden='true'></i> " . $thisplataforma . "</a>";
                    }
                }
            ?>
            <a href="#" class="list-group-item"></a>
          </div>
          <form style="margin-bottom: 5px;" action="codes/gerarpdf.php">
                <button class="btn btn-default btn-md" style="width:280px;" type="submit">Exportar currículo <i class="fa fa-file-pdf-o" aria-hidden="true"></i></button>
        </form>   
        <form action="codes/apagarcadastro.php">
                <button class="btn btn-default btn-md" style="width:280px;" onClick="return confirm('Quer mesmo apagar sua conta?')" type="submit">Apagar minha conta <i class="fa fa-trash-o" aria-hidden="true"></i></button>
        </form>   
        </div>
      </div>
      <hr>

      <footer>
        <p>&copy; Company 2016</p>
      </footer>

    </div><!--/.container-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
