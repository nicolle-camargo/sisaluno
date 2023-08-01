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

  h1{
    color: #2A9D8F;
  }
</style>

<div class="container mt-3">
  <h1>Lista de Alunos</h1>
  
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Idade</th>
        <th>Data de nascimento</th>
        <th>Endereço</th>
        <th>Status</th>
        <th>Alterar</th>
        <th>Excluir</th>
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
                            <td> <?php echo $value['status']?> </td>

                            <td>
                               <form method="POST" action="altaluno.php">
                                        <input name="id" type="hidden" value="<?php echo $value['id'];?>"/>
                                        <button class= btn btn-warning name="update"  type="submit">Alterar</button>
                                </form>
                             </td> 

                             <td>
                               <form method="GET" action="crudaluno.php">
                                        <input name="id" type="hidden" value="<?php echo $value['id'];?>"/>
                                        <button name="excluir" class= btn btn-warning type="submit">Excluir</button>
     
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
