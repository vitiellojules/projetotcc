


<?php
// Define o fuso horário correto para São Paulo
date_default_timezone_set('America/Sao_Paulo');

// Configuração do banco de dados usando variáveis de ambiente
$cleardb_url = getenv("CLEARDB_DATABASE_URL");
if ($cleardb_url) {
    $url = parse_url($cleardb_url);
    $host = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $database = substr($url["path"], 1);
} else {
    // Configuração local para desenvolvimento
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "preschooldb";
}

// Conexão com o banco de dados
$con = mysqli_connect($host, $username, $password, $database);

// Verifica se a conexão falhou
if (mysqli_connect_errno()) {
    echo "Connection Fail: " . mysqli_connect_error();
}
?>
