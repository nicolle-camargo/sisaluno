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
require_once('../conexao.php');

##cadastrar
if(isset($_GET['cadastrar'])){
        ##dados recebidos pelo metodo GET
        $nomedisciplina = $_GET["nomedisciplina"];
        $ch = $_GET["ch"];
        $semestre = $_GET["semestre"];
        $idprofessor = $_GET["idprofessor"];


        // $disciplina = filter_input(INPUT_GET, 'disciplina', FILTER_SANITIZE_STRING);

        ##codigo SQL
        $sql = "INSERT INTO disciplina(nomedisciplina, ch, semestre, idprofessor) 
                VALUES('$nomedisciplina', '$ch', '$semestre', '$idprofessor')";

        ##junta o codigo sql a conexao do banco
        $sqlcombanco = $conexao->prepare($sql);

        ##executa o sql no banco de dados
        if($sqlcombanco->execute())
            {
                echo "<p>      </p>";
                echo "<center>A Disciplina
                <strong>$nomedisciplina</strong> foi Incluído(a) com Sucesso!!!"; 
                echo "<p></p>";
                echo " <button class='btn btn-default'><a href='../index.php'>Voltar ao Início</a></button>";
                echo " <button class='btn btn-default'><a href='listadisciplina.php'>Ver Lista das Disciplinas</a></button>";
            }
        }

#######alterar
if(isset($_POST['update'])){

    ##dados recebidos pelo metodo POST
    $nomedisciplina = $_POST["nomedisciplina"];
    $ch = $_POST["ch"];
    $semestre = $_POST["semestre"];
    $idprofessor = $_POST["idprofessor"];
    $id = $_POST["id"];
   
    ##codigo sql
    $sql = "UPDATE Disciplina SET nomedisciplina= :nomedisciplina,
                                 ch= :ch,
                                 semestre= :semestre,
                                 idprofessor= :idprofessor
                                 WHERE id= :id";

    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':id',$id, PDO::PARAM_INT);
    $stmt->bindParam(':nomedisciplina',$nomedisciplina, PDO::PARAM_STR);
    $stmt->bindParam(':ch',$ch, PDO::PARAM_STR);
    $stmt->bindParam(':semestre',$semestre, PDO::PARAM_STR);
    $stmt->bindParam(':idprofessor',$idprofessor, PDO::PARAM_STR);
    $stmt->execute();

    if($stmt->execute())
    {
            echo "<p>  </p>";
            echo "<center>A Disciplina <strong>$nomedisciplina</strong> foi Alterada com Sucesso!!!"; 
            echo "<p> </p>";
            echo "<button class='btn btn-defautl'><a href='listadisciplina.php'>Voltar à Lista</a></button>";
            echo "   <button class='btn btn-defautl'><a href='index.php'>Voltar ao Início</a></button>";
        }
    }

function excluirdisciplina($conexao, $id) {
    try {
        $sql = "DELETE FROM `Disciplina` WHERE id = :id";
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        echo "<p> </p>";
        echo "<center>A Disciplina <strong>$id</strong> foi Excluída!!!";
        echo "<p> </p>";
        echo " <button class='btn btn-default'><a href='listadisciplina.php'>Voltar</a></button>";
    } catch (PDOException $e) {
        echo "Erro ao Excluir " . $e->getMessage();
    }
}

if (isset($_GET['excluir']) && isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_POST['confirmar']) && $_POST['confirmar'] === '1') {
        excluirdisciplina($conexao, $id);
    } else {

        echo "<p>      </p>";
        echo "<center>Excluir a Disciplina <strong>$id</strong>?";
        echo "<form action='cruddisciplina.php?excluir=1&id=$id' method='post'>";
        echo "<input type='hidden' name='confirmar' value='1'>";
        echo "<p> </p> <button type='submit' class='btn btn-defautl' <a href=''>Confirmar</a></button>";
        
        echo "   <button class='btn btn-defautl'><a href='listadisciplina.php'>Cancelar</a></button>";
        echo "</form>";
    }
}