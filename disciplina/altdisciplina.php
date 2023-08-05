<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>Alterar Disciplina</title>

  <style>
    body{
      background-color: #f1f1f1;
      padding: 30px;
 
    }

    h1{
      color: #E76F51;
    }

    form{
      padding-left: 10px;
    }
  </style>
</head>
<body>

<?php
   require_once('../conexao.php');

   $id = $_POST['id'];

   ##sql para selecionar apens um
   $sql = "SELECT * FROM disciplina where id= :id";
   
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
   $nomedisciplina = $array_retorno['nomedisciplina'];
   $ch = $array_retorno['ch'];
   $semestre = $array_retorno['semestre'];
   $idprofessor = $array_retorno['idprofessor'];
?>


  <h1>Alterar Disciplina</h1>
  <p>  </p>
  <form class="row g-3" method="POST" action="cruddisciplina.php"> 

  <input type="hidden" required name="id" id="" value='<?php echo $id; ?>' >
    <div class="col-md-6">
      <label for="" class="form-label">Nome:</label>
      <input type="text" required name="nomedisciplina" class="form-control" id="inputEmail4" maxlength="100" value='<?php echo $nomedisciplina ?>' >
    </div>

    <div class="col-md-5">
      <label for="" required class="form-label">Carga Horária:</label>
      <input type="text" required placeholder="Formato: 00h" min='2' name="ch" class="form-control" id="inputEmail4" value='<?php echo $ch ?>'>
    </div>
    
    <div class="col-md-5">
      <label for="" class="form-label">Semestre:</label>
      <select id="inputState" class="form-select" value='<?php echo $semestre ?>' name="semestre" required>
        <option>1/6</option>
        <option>2/6</option>
        <option>3/6</option>
        <option>4/6</option>
        <option>5/6</option>
        <option>6/6</option>
        </select>
    </div>

    <div class="col-md-6">
      <label for=""  class="form-label">ID do(a) Professor(a):</label>
      <input type="number" required name="idprofessor" class="form-control" id="inputEmail4" value='<?php echo $idprofessor ?>'>
    </div>  


    <div class="col-12">
    <p>  </p>
      <center><button type="submit"  style= "background-color: #E76F51" class="btn" name="update" value="Alterar">Alterar   <button class='btn btn-default'><a href='listadisciplina.php'>Cancelar</a></button></center>
    </div>
  </form>
</body>

</html>
