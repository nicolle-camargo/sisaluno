<?php
define('HOST', '10.70.230.53:3306');
define('USUARIO', 'sisaluno');
define('SENHA', 'sisaluno2023');
define('DBNAME', 'sisaluno');

try{
    $conexao = new pdo('mysql:host=' . HOST . ';dbname=' . DBNAME, USUARIO, SENHA);
}

catch (PDOException $e){
    echo "Erro na conexão com o BD" . $e->getMessage();
}

// do meu: host - mysql, user - root, senha vazia e dbname PSW1
?>

