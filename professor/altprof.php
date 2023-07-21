<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>Alterar Professor(a)</title>

  <style>
    * {
      margin: 10px;
      background-color: #f1f1f1;
    }

    h1{
      color: #E9C46A;
    }
  </style>
</head>
<body>

<?php
   require_once('conexao.php');

   $id = $_POST['id'];

   ##sql para selecionar apens um professor
   $sql = "SELECT * FROM professor where id= :id";
   
   # junta o sql a conexao do banco
   $retorno = $conexao->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':id',$id, PDO::PARAM_INT);

   #executa a estrutura no banco
   $retorno->execute();

   #transforma o retorno em array
   $array_retorno=$retorno->fetch();
   
   ##armazena retorno em variaveis
  //  $id = $array_retorno['id'];
   $nome = $array_retorno['nome'];
   $idade = $array_retorno['idade'];
   $datanascimento = $array_retorno['datanascimento'];
   $endereco = $array_retorno['endereco'];
   $status = $array_retorno['status'];
?>


  <h1>Alterar Professor(a)</h1>
  <form class="row g-3" method="POST" action="crudprof.php"> 

  <input type="hidden" required name="id" id="" value="<?php echo $id; ?>" >
    <div class="col-md-6">
      <label for="" class="form-label">Nome:</label>
      <input type="text" required name="nome" class="form-control" id="inputEmail4" value=<?php echo $nome ?> >
    </div>

    <div class="col-md-2">
      <label for="" required class="form-label">Idade:</label>
      <input type="number" required name="idade" class="form-control" id="inputEmail4" value=<?php echo $idade ?>>
    </div>
    
    <div class="col-md-2">
      <label for="" class="form-label">Data de nascimento:</label>
      <input type="date" required name="datanascimento" class="form-control" id="inputEmail4" value=<?php echo $datanascimento ?> >
    </div>

    <div class="col-md-5">
      <label for=""  class="form-label">Endereço:</label>
      <input type="text" required name="endereco" class="form-control" id="inputEmail4" value=<?php echo $endereco ?>>
    </div>  

    <div class="col-md-4">
      <label for="inputState" name="status" class="form-label" value=<?php echo $status ?> >Status:</label>
      <select id="inputState" required class="form-select" value=<?php echo $status ?> name="status" >
        <option>AT</option>
        <option>NA</option>
      </select>
    </div>

    <div class="col-12">
      <center><button type="submit" class="btn btn-warning" name="update" value="Alterar">Alterar</center>
    </div>
  </form>
</body>

</html>