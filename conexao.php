<?php
    function connectMySql(){
        $db_host    = "127.0.0.1";
        $db_name    = "php_mysql_bootstrap";
        $db_user    = "root";
        $db_passwd  = "";
        $db_charset = "utf8mb4";

        $dsn = "mysql:host=$db_host; dbname=$db_name; charset=$db_charset";

        try{
            $pdo = new PDO($dsn, $db_user, $db_passwd);
            return $pdo;
        }catch(PDOException $e){
            exit("Erro ao conectar com o banco de dados: ".$e->getMessage());
        }
    }
?>