<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Formulário de Cadastro</title>

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
  <h1>Cadastro de Disciplina</h1>
  <p>  </p>
  <form class="row g-3" method="GET" action="cruddisciplina.php"> 
    <div class="col-md-6">
      <label for="" class="form-label">Nome:</label>
      <input type="text" name="nomedisciplina" class="form-control" id="inputEmail4" required placeholder="Digite o nome da disciplina" maxlength="100">
    </div>

    <div class="col-md-4">
      <label for="" class="form-label">Carga Horária:</label>
      <input type="text" name="ch" class="form-control" id="inputEmail4" required placeholder="Formato: 00h" min='2'>
    </div>

    <div class="col-md-5">
      <label for="" class="form-label">Semestre:</label>
      <select id="inputState" class="form-select" name="semestre" required placeholder="Selecione">
        <option>1/6</option>
        <option>2/6</option>
        <option>3/6</option>
        <option>4/6</option>
        <option>5/6</option>
        <option>6/6</option>
      </select>
    </div>

    <div class="col-md-5">
      <label for="" class="form-label">ID do(a) Professor(a):</label>
      <input type="number" name="idprofessor" class="form-control" id="inputEmail4" required min:1 placeholder="Digite o ID do(a) Professor(a)">
    </div>


    <div class="col-12">
    <p>  </p>
    <center><button type="submit" style= "background-color: #E76F51" class="btn" name="cadastrar" value="cadastrar">Cadastrar</button> 
    <button class='btn'><a href='../index.php'>Voltar ao Início</a></button>
    </center>

    </div>
  </form>
</body>

</html>
