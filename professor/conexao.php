<?php
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DBNAME', 'PSW1');

try{
    $conexao = new pdo('mysql:host=' . HOST . ';dbname=' . DBNAME, USUARIO, SENHA);
}

catch (PDOException $e){
    echo "Erro na conexão com o BD" . $e->getMessage();
}
?>

