<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>CRUD</title>
</head>
<body>
    
</body>
</html>

<?php
##permite acesso as variaves dentro do aquivo conexao
require_once('conexao.php');

##cadastrar
if(isset($_GET['cadastrar'])){
        ##dados recebidos pelo metodo GET
        $nome = $_GET["nome"];
        $idade = $_GET["idade"];
        $datanascimento = $_GET["datanascimento"];
        $endereco = $_GET["endereco"];
        $status = $_GET["status"];

        ##codigo SQL
        $sql = "INSERT INTO professor(nome, idade, datanascimento, endereco, status) 
                VALUES('$nome', '$idade', '$datanascimento', '$endereco', '$status')";

        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {
                echo "<p>      </p>";
                echo "<center>O(A) Professor(a)
                <strong>$nome</strong> foi Incluído(a) com Sucesso!!!"; 
                echo "<p></p>";
                echo " <button class='btn btn-default'><a href='index.php'>Voltar ao Início</a></button>";
                echo " <button class='btn btn-default'><a href='listaprofs.php'>Ver Lista de Professores</a></button>";
            }
        }

#######alterar
if(isset($_POST['update'])){

    ##dados recebidos pelo metodo POST
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $datanascimento = $_POST["datanascimento"];
    $endereco = $_POST["endereco"];
    $status = $_POST["status"];
    $id = $_POST["id"];
   
    ##codigo sql
    $sql = "UPDATE Professor SET nome= :nome,
                                 idade= :idade,
                                 datanascimento= :datanascimento,
                                 endereco= :endereco,
                                 status= :status
                                 WHERE id= :id";

    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':id',$id, PDO::PARAM_INT);
    $stmt->bindParam(':nome',$nome, PDO::PARAM_STR);
    $stmt->bindParam(':idade',$idade, PDO::PARAM_INT);
    $stmt->bindParam(':datanascimento',$datanascimento, PDO::PARAM_STR);
    $stmt->bindParam(':endereco',$endereco, PDO::PARAM_STR);
    $stmt->bindParam(':status',$status, PDO::PARAM_STR);
    $stmt->execute();

    if($stmt->execute())
    {
            echo "<p>  </p>";
            echo "<center>O(A) Professor(a) <strong>$nome</strong> foi Alterado(a) com Sucesso!!!"; 
            echo "<p> </p>";
            echo "<button class='btn btn-defautl'><a href='listaprofs.php'>Voltar à Lista</a></button>";
            echo "   <button class='btn btn-defautl'><a href='index.php'>Voltar ao Início</a></button>";
        }
    }

function excluirprof($conexao, $id) {
    try {
        $sql = "DELETE FROM `Professor` WHERE id = :id";
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        echo "<p> </p>";
        echo "<center>O Professor <strong>$id</strong> foi Excluído!!!";
        echo "<p> </p>";
        echo " <button class='btn btn-default'><a href='listaprofs.php'>Voltar</a></button>";
    } catch (PDOException $e) {
        echo "Erro ao Excluir " . $e->getMessage();
    }
}

if (isset($_GET['excluir']) && isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_POST['confirmar']) && $_POST['confirmar'] === '1') {
        excluirprof($conexao, $id);
    } else {

        echo "<p>      </p>";
        echo "<center>Excluir o Professor <strong>$id</strong>?";
        echo "<form action='crudprof.php?excluir=1&id=$id' method='post'>";
        echo "<input type='hidden' name='confirmar' value='1'>";
        echo "<p> </p> <button type='submit' class='btn btn-defautl' <a href=''>Confirmar</a></button>";
        
        echo "   <button class='btn btn-defautl'><a href='listaprofs.php'>Cancelar</a></button>";
        echo "</form>";
    }
}