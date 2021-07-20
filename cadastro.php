<?php
  require_once("estados.php");
  require_once("function.php");
  require_once("conexao.php");
  
  $id       = "";
  $nome     = "";
  $idade    = "";
  $telefone = "";
  $email    = "";
  $endereco = "";
  $cidade   = "";
  $estado   = "";

  if(isset($_GET["id"]) && $_GET["id"]!=""){

    $id   = $_GET["id"];
    $tab  = "dados"; 
    $nome = "id"; 
    $pdo  = connectMySql();    

    $registros = getOneRegistro($pdo, $tab, $nome, $id);

    foreach($registros as $i => $r){
      $nome     = $r["nome"];
      $idade    = $r["idade"];
      $telefone = $r["telefone"];
      $email    = $r["email"];
      $endereco = $r["endereco"];
      $cidade   = $r["cidade"];
      $estado   = $r["estado"];
    }    
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Levi Alves Junior">
    <meta name="description" content="Cadastro com MySql e Bootstrap">
    <meta name="robots" content="index, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CMB - Cadastro</title>
    <link rel="shortcut icon" type="imagem/png" href="img/cadastro.png">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- font-awesome -->
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <!-- optional javascript -->
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script><!-- usar tanto o popper quanto o javscript do bootstrap -->    

  </head>
  <body>
    <header>      
      <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
        <div class="container">          
          <a class="navbar-brand" href="index.html">CMB-HOME</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
            <span class="navbar-toggler-icon"></span>
          </button>  
          <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">            
              <li class="nav-item">
                <a class="nav-link active" href="cadastro.php">Cadastrar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="listar.php">Listar</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <main class="container">
      <div class="bg-light p-5 rounded" style="margin-top: 150px; margin-bottom: 100px;">
        <form method="POST" action="cadastrar.php">          
          <input type="hidden" name="id" id="id" value="<?php echo $id; ?>"> <!-- retorna o id para salvar a modificação em "cadastrar.php" -->
          <div class="form-group">
            <lable for="nome">Nome:</lable>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="<?php echo $nome; ?>" autofocus required>
          </div>
          <div class="row">
            <div class="form-group col-md-4 mt-3">
              <label for="idade">Idade:</label>
              <input type="number" class="form-control" name="idade" id="idade" placeholder="Idade" value="<?php echo $idade; ?>" maxlength="14" required>
            </div>
            <div class="form-group col-md-8 mt-3">
              <label for="telefone">Telefone:</label>
              <input type="tel" class="form-control" name="telefone" id="telefone" placeholder="Telefone" value="<?php echo $telefone; ?>" maxlength="14" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="email@dominio.com" value="<?php echo $email; ?>" required>
          </div>
          <div class="form-group mt-3">
            <label for="endereco">Endereço:</label>
            <input type="endereco" class="form-control" name="endereco" id="endereco" placeholder="Endereço" value="<?php echo $endereco; ?>" required>
          </div>
          <div class="row">
            <div class="form-group col-md-8 mt-3">
              <label for="cidade">Cidade:</label> 
              <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade" value="<?php echo $cidade; ?>" required>
            </div>
            <div class="form-group col-md-4 mt-3">
              <label for="estado">Estado:</label>
              <select class="form-control" name="estado" id="estado" required>
              <?php
                echo"<option value='' disabled selected>Estado</option>";
                if($estado != ""){
                  $uf_select = $estado;
                  
                }
                foreach($estados as $i => $uf){
                  if($uf_select == $uf){
                    echo"<option value='$i' selected>".$uf."</option>";
                  }else{
                    echo"<option value='$i'>".$uf."</option>";
                  }
                }
              ?>
              </select>
            </div>              
          </div>
          <div class="form-group mt-5">
            <button type="submit" class="btn btn-primary">Enviar</button>
            <button type="reset" class="btn btn-warning">Limpar</button> 
          </div>                       
        </form>
      </div>
    </main>

    <footer>      
    </footer>

  </body>
</html>