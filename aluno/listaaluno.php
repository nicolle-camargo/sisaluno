<?php 
 require_once('../conexao.php');
   
  $retorno = $conexao->prepare('SELECT * FROM aluno');
  $retorno->execute();
?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Lista de Alunos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<style>
  body{
    background-color: #f1f1f1;
    padding-top: 30px;
  }

  table{
    background-color:white;
  }

  h2{
    color: #2A9D8F;
  }
</style>

<div class="container mt-3">
  <h2><strong>Lista de Alunos</strong></h2>
  
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Idade</th>
        <th>Data de nascimento</th>
        <th>Endereço</th>
        <th>Estatus</th>
        <th><center>Alterar</center></th>
        <th><center>Excluir</center></th>
      </tr>
    </thead>

    <tbody>
                <tr>
                    <?php foreach($retorno->fetchall() as $value) { ?>
                        <tr>
                            <td> <?php echo $value['id'] ?>   </td> 
                            <td> <?php echo $value['nome']?>  </td> 
                            <td> <?php echo $value['idade']?>  </td> 
                            <td> <?php echo $value['datanascimento']?> </td>
                            <td> <?php echo $value['endereco']?> </td>
                            <td> <?php echo $value['estatus']?> </td>

                            <td>
                               <form method="POST" action="altaluno.php">
                                <center>
                                        <input name="id" type="hidden" value="<?php echo $value['id'];?>"/>
                                        <button class= btn btn-warning name="update"  type="submit">Alterar</button>
                    </center>
                                </form>
                             </td> 

                             <td>
                               <form method="GET" action="crudaluno.php">
                               <center>
                                        <input name="id" type="hidden" value="<?php echo $value['id'];?>"/>
                                        <button name="excluir" class= btn btn-warning type="submit">Excluir</button>
                                        </center>
                                </form>

                             </td>    
                      </tr>
                    <?php  }  ?> 
                 </tr>
            </tbody>
  </table>
  <?php      
   echo "<center><button class='btn btn-default'><a href='../index.php'>Voltar</a></button>  <button class='btn btn-default'><a href='cadaluno.php'>Adicionar</a></button></center>";

?>
</div>

</body>
</html>
