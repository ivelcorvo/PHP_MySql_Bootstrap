<?php
  require_once("function.php");
  require_once("conexao.php");

  $pdo = connectMySql();

  $tabela = "dados";

  $registros = [];

  $registros = getAllRegistros($pdo, $tabela);
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
    <title>CMB - Listar</title>
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
                <a class="nav-link" href="cadastro.php">Cadastrar</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="listar.php">Listar</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <main class="container">
      <div class="bg-light p-5 rounded overflow-scroll" style="margin-top: 150px;">        
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">Idade</th>
              <th scope="col">Telefone</th>
              <th scope="col">E-mail</th>
              <th scope="col">Endereço</th>
              <th scope="col">Cidade</th>
              <th scope="col">Estado</th>      
              <th scope="col">opções</th>        
            </tr>
          </thead>
          <tbody>
          <?php
            foreach($registros as $i => $r){
              echo"<tr>";
                // echo"<td scope='row'>".$i."</td>";
                echo"<td>".$r["id"]."</td>";
                echo"<td>".$r["nome"]."</td>";
                echo"<td>".$r["idade"]."</td>";
                echo"<td>".$r["telefone"]."</td>";
                echo"<td>".$r["email"]."</td>";
                echo"<td>".$r["endereco"]."</td>";
                echo"<td>".$r["cidade"]."</td>";
                echo"<td>".$r["estado"]."</td>";
                echo"<td>";
                  echo"<a class='btn btn-danger' style='margin-right: 8px;' href='apagar.php?id=".$r["id"]."'><i class='fa fa-trash-o fa-lg'></i></a>";
                  echo"<a class='btn btn-warning' href='cadastro.php?id=".$r["id"]."'><i class='fa fa-pencil fa-lg'></i></a>";
                echo"<td>";
              echo"</tr>";
            }
          ?>
          </tbody>
        </table>
      </div>
    </main>

    <footer>      
    </footer>

  </body>
</html>