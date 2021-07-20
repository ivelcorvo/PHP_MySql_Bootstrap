<?php
  require_once("conexao.php");
  require_once("estados.php");

  $pdo = connectMySql();

  $nome     = "";
  $idade    = "";
  $telefone = "";
  $email    = "";
  $endereco = "";    
  $cidade   = "";
  $estado   = "";

  if(isset($_POST["id"]) && $_POST["id"]!=""){
    $id       = $_POST["id"];
    $nome     = $_POST["nome"];
    $idade    = $_POST["idade"];
    $telefone = $_POST["telefone"];
    $email    = $_POST["email"];
    $endereco = $_POST["endereco"];    
    $cidade   = $_POST["cidade"];
    $estado   = $estados[$_POST["estado"]];

    $sql = "UPDATE dados SET nome = :nome, idade = :idade, telefone = :telefone, email = :email, endereco = :endereco, cidade = :cidade, estado = :estado WHERE id = :id";

    try{
      $stmt = $pdo->prepare($sql);
      $stmt->execute([":nome"=>$nome, ":idade"=>$idade, ":telefone"=>$telefone, ":email"=>$email, ":endereco"=>$endereco, ":cidade"=>$cidade, ":estado"=>$estado, ":id"=>$id]);
    }catch(Exception $e){
      exit("Erro ao atualizar dasdos: ".$e->getMessage());
    }

  }else if(count($_POST)){
    $nome     = $_POST["nome"];
    $idade    = $_POST["idade"];
    $telefone = $_POST["telefone"];
    $email    = $_POST["email"];
    $endereco = $_POST["endereco"];    
    $cidade   = $_POST["cidade"];
    $estado   = $estados[$_POST["estado"]];

    $sql = "INSERT INTO dados(nome, idade, telefone, email, endereco, cidade, estado) VALUES(?,?,?,?,?,?,?)";
    
    try{
      $stmt = $pdo->prepare($sql);
      $stmt->execute([$nome, $idade, $telefone, $email, $endereco, $cidade, $estado]);
    }
    catch(Exception $e){
      exit("Erro ao cadastrar: ".$e->getMessage());
    }
  }

  header("location: listar.php");    
?>