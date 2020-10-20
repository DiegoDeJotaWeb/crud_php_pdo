<?php
    include_once "conexao.php";
    $con = PdoConexao::getInstancia();

try{

    $sql = "SELECT * FROM login";
    //execução da instrução sql
    $consulta = $con->query($sql);  

    echo "<a href='formCadastro.php'>novo cadastro</a><br><br> Listagem de usuários";
    echo "<table border='1'><tr><td>Nome</td><td>Login</td><td>Ações</td><tr>";

    while($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
        echo "<tr><td>$linha[nome]</td><td>$linha[login]</td><td>
        <a href='formEditar.php?id=$linha[id]'>Editar</a> |
        <a href='excluir.php?id=$linha[id]'>Excluir</a> </td><tr>";
    }
    echo "</table>";
    echo $consulta->rowCount() . " Registros exibidos";
}catch(PDOException $e){
    echo $e->getMessage();
}

?>