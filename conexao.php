<?php
$servidor = "localhost";
$usuario = "root";
$senha="";
$dbname = "site";


//criar conexão
$conn = mysqli_connect ($servidor, $usuario, $senha, $dbname);

if(mysqli_insert_id($conn)){

    echo "enviado";
}
?>