<?php
 include_once "conexao.php";
 $con = PdoConexao::getInstancia();

 try{
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    

    $sql = "DELETE FROM login WHERE id = :id";
    echo $sql;

    $delite = $con->prepare($sql);
    $delite->bindParam(':id',$id);
    $delite->execute();

    header("location: index.php");

}catch(PDOException $e){
    echo "erro: " . $e->getMessage();
}


?>