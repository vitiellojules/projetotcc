<?php
// Define o fuso horário correto para São Paulo
date_default_timezone_set('America/Sao_Paulo');

// Conexão com o banco de dados
$con = mysqli_connect("localhost", "root", "", "preschooldb");

// Verifica se a conexão falhou
if (mysqli_connect_errno()) {
    echo "Connection Fail: ".mysqli_connect_error();
}
?>
