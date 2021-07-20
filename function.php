<?php
  // ================================================================================================  
  // retorna todos os registros de uma tabela em forma de vetor
  function getAllRegistros($pdo, $tabela){

    $sql = "SELECT * FROM ".$tabela;

    $registros = [];

    try{
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      while($rows = $stmt->fetch()){
        $registros[] = $rows;
      }

      return $registros;

    }catch(Exception $e){
      exit("Erro ao retornar os registros do branco de dados: ".$e->getMessage());
    }  
  }

  // ================================================================================================  
  // retorna apenas um registro de uma tabela em forma de vetor
  function getOneRegistro($pdo, $tabela, $nomeCampo, $valorCampo){
    $sql = "SELECT * FROM ".$tabela." WHERE ".$nomeCampo." = ".$valorCampo;
    $registro = [];

    try{      
      $stmt = $pdo->prepare($sql);
      $stmt->execute();

      while($rows = $stmt->fetch()){
        $registro[] = $rows; 
      }

      return $registro;
    
    }catch(Exception $e){
      exit("Erro ao retornar o registro do banco de dados: ".$e->getMessage());
    }
  }

  // ================================================================================================
  // deleta um registro de uma tabela utilizando um parametro para um campo do registro
  function deleteOneRegistro($pdo, $tabela, $nomeCampo, $valorCampo){
    $sql = "DELETE FROM ".$tabela." WHERE ".$nomeCampo." LIKE :".$nomeCampo;

    try{
      $stmt = $pdo->prepare($sql);
      $stmt->execute([":".$nomeCampo=>"%".$valorCampo."%"]);
    }catch(Exception $e){
      exit("Erro ao remover registros do banco de dados: ".$e->getMessage());
    }
  }
?>