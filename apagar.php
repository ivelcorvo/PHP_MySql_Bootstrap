<?php
  require_once("function.php");
  require_once("conexao.php");
  if(isset($_GET["id"]) && $_GET["id"]!=""){
    
    $id        = $_GET["id"];
    $tabela    = "dados";    
    $nomeCampo = "id";    
    $pdo       = connectMySql();

    // sem a função seria dessa formar. 
    // só mantive tudo comentado aqui para lembrar como fiz
    // $sql = "DELETE FROM dados WHERE id LIKE :id";
    // try{
    //   $stmt = $pdo->prepare($sql);
    //   $stmt->execute([":id"=>"%".$id."%"]);
    // }catch(Exception $e){
    //   exit("Erro ao remover registros do banco de dados: ".$e->getMessage());
    // }

    deleteOneRegistro($pdo, $tabela, $nomeCampo, $id);
  }

  header("location: listar.php");
?>