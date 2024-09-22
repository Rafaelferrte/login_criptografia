<?php

$usuario = 'admin'; 
$senha = md5('123456'); 

// Captura os dados do formulário
$user_digi = $_POST['campo_usuario'];
$pass_digi = md5($_POST['campo_senha']); // Criptografa a senha digitada

// Verifica se o usuário e a senha estão corretos
if ($usuario === $user_digi && $senha === $pass_digi) {
    // Redireciona para a página de boas-vindas
    header("Location: page.php");
    exit();
} else {
    // Mensagem de erro caso o login falhe
    header("Location: index.php");
    exit();
}
?>
