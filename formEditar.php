<?php
    include_once "conexao.php";
    $con = PdoConexao::getInstancia();

    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $sql = "SELECT * FROM login where id = '$id'";
    $consulta = $con->query($sql);

    $linha = $consulta->fetch(PDO::FETCH_ASSOC);

    
?>


<form action="editar.php" method="POST">
    <label for="">Nome</label>
    <input type="text" name="nome" id="nome" value="<?php echo $linha['nome']?>">
    <br><br>
    <label for="">Login</label>
    <input type="text" name="login" id="login" value="<?php echo $linha['login']?>">
    <br><br>
    <input type="hidden" name="id" value="<?php echo $linha['id']?>">
    <input type="submit" value="Editar">

</form>


<?php


?>