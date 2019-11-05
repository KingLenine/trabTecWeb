<?php

include_once("conexao.php");



$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
$caract = filter_input(INPUT_POST, 'caract', FILTER_SANITIZE_STRING);

$result_usuario = "INSERT INTO usuarios (nome, data, caract, criado ) VALUES('$nome', '$data', '$caract', NOW())"; 

$resultado = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)){

    header('Location: dadosenviados.html' );
}

?>

