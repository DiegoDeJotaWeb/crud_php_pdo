<?php
    include_once "conexao.php";
    $con = PdoConexao::getInstancia();

    try{
        $nome = filter_var($_POST['nome']);
        $login = filter_var($_POST['login']);

        $sql = "INSERT INTO login (nome,login)values(:nome, :login)";
     

        $insert = $con->prepare($sql);
        $insert->bindParam(':nome',$nome);
        $insert->bindParam(':login',$login);
        $insert->execute();

        header("location: index.php");

    }catch(PDOException $e){
        echo "erro: " . $e->getMessage();
    }


?>