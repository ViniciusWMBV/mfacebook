<?php

// Dados do banco de dados
$host = "localhost";
$user = "root";
$senha = "";
$banco = "usuarios";

// Conexão com o banco de dados
$conexao = mysqli_connect($host, $user, $senha, $banco);

// Verifica se houve erro na conexão
if (mysqli_connect_errno()) {
    echo "Erro na conexão com o banco de dados: " . mysqli_connect_error();
}

// Recebe os dados do formulário
$email_telefone = $_POST['email_telefone'];
$senha = $_POST['senha'];

// Consulta o banco de dados para verificar se as informações de login são válidas
$query = "SELECT * FROM usuarios WHERE (email = '$email_telefone' OR telefone = '$email_telefone') AND senha = '$senha'";
$resultado = mysqli_query($conexao, $query);

// Verifica se houve resultado na consulta
if (mysqli_num_rows($resultado) == 1) {
    // Login válido
    echo "Login válido";
} else {
    // Login inválido
    echo "Login inválido";
}

// Fecha a conexão com o banco de dados
mysqli_close($conexao);

?>
