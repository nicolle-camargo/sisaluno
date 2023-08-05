<?php 
 require_once('../conexao.php');
   
  $retorno = $conexao->prepare('SELECT * FROM disciplina');
  $retorno->execute();
?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Lista de Disciplinas</title>
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
    color: #E76F51;
  }
</style>

<div class="container mt-3">
  <h2><strong>Lista de Disciplinas</strong></h2>
  
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Carga Horária</th>
        <th>Semestre</th>
        <th>ID Professor</th>
        <th><center>Alterar</center></th>
        <th><center>Excluir</center></th>
      </tr>
    </thead>

    <tbody>
                <tr>
                    <?php foreach($retorno->fetchall() as $value) { ?>
                        <tr>
                            <td> <?php echo $value['id'] ?>   </td> 
                            <td> <?php echo $value['nomedisciplina']?>  </td> 
                            <td> <?php echo $value['ch']?>  </td> 
                            <td> <?php echo $value['semestre']?> </td>
                            <td> <?php echo $value['idprofessor']?> </td>

                            <td>
                               <form method="POST" action="altdisciplina.php">
                               <center>
                                        <input name="id" type="hidden" value="<?php echo $value['id'];?>"/>
                                        <button class= btn btn-warning name="update"  type="submit">Alterar</button>
                    </center>
                                </form>
                             </td> 

                             <td>
                               <form method="GET" action="cruddisciplina.php">
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
   echo "<center><button class='btn btn-default'><a href='../index.php'>Voltar</a></button>  <button class='btn btn-default'><a href='caddisciplina.php'>Adicionar</a></button></center>";

?>
</div>

</body>
</html>
