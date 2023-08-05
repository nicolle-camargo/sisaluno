<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Página Inicial</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Histeria';
            margin: 0px;
            padding: 0px;
        }

        .header {
            background-color: #f1f1f1;
            padding: 30px;
            text-align: center;
            font-size: 35px;
            height: 150px;
        }

        .row {
            display: -webkit-flex;
            display: flex;
        }

        .row h3{
            padding-bottom: 10px;
        }

        .row img{
            height:100px;
        }


        .column {
            -webkit-flex: 1;
            -ms-flex: 1; /*funcionar em diferentes navegadores*/
            flex: 1;
            padding: 10px;
            height: 520px;
        }

        .footer {
            background-color: #f1f1f1;
            padding: 10px;
            text-align: center;
        }

        /*deixando responsivo*/
        @media (max-width: 600px) {
            .row {
                -webkit-flex-direction: column;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <h1><strong>Sistema Acadêmico</strong></h1>
    </div>
    <div class="row">
        <div class="column" style="background-color:#2A9D8F;"><center><h3>Aluno</h3></center>
        <p> </p>
        <center>
        <button class="btn  "><a href="./aluno/cadaluno.php">Cadastrar Aluno(a)</a></button>
    
        <p> </p>
        <button class="btn "><a href="./aluno/listaaluno.php">Lista dos Alunos</a></button>
    </center>
    </div>
        
        
        <div class="column" style="background-color:#E9C46A;"><center><h3>Professor</h3></center>
        <p> </p>
        <center>
        <button class="btn  "><a href="./professor/cadprof.php">Cadastrar Professor(a)</a></button>
    
        <p> </p>
        <button class="btn "><a href="./professor/listaprofs.php">Lista dos Professores</a></button>
        </center>

    </div>
        <div class="column" style="background-color:#E76F51;"><center><h3>Disciplina</h3></center>
        <p> </p>
        <center>
        <button class="btn  "><a href="./disciplina/caddisciplina.php">Cadastrar Disciplina</a></button>
    
        <p> </p>
        <button class="btn "><a href="./disciplina/listadisciplina.php">Lista de Disciplinas</a></button>
        </center>
    </div></div></div>

    <div class="footer">
        <p><h4>2023</h4></p>
    </div>
</body>
</html>
