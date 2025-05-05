<?php

$email = "";
$senha = "";
$usuario = "";
$erroEmail = "";
$erroSenha = "";
$erroUsuario = "";
$resultado = "";


$emailTeste = "biaelais@gmail.com";
$senhaTeste = "Teste123";
$usuarioTeste = "Biaelais"; 


function formataDados($dado) {
    $dado = trim($dado);
    $dado = stripslashes($dado);
    $dado = htmlspecialchars($dado);
    return $dado;
}

function verificaDados($dado, &$erro) {
    if (isset($dado) && !empty($dado)) {
        return formataDados($dado);
    } else {
        $erro = "Campo de preenchimento obrigatório";
        return "";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = verificaDados($_POST["email"] ?? "", $erroEmail);
    $senha = verificaDados($_POST["senha"] ?? "", $erroSenha);
    $usuario = verificaDados($_POST["usuario"] ?? "", $erroUsuario);

    if ($email === $emailTeste && $senha === $senhaTeste && $usuario === $usuarioTeste) {
        $resultado = "Login feito com sucesso! Seja bem-vindo " . htmlspecialchars($usuario) . ", e-mail cadastrado: " . htmlspecialchars($email);
    } else {
        $resultado = "E-mail, senha ou Usuário não conferem";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>

        body{
            text-align:center;
            font-family: Lucida Sans, Lucida Sans Regular, Lucida Grande, Lucida Sans Unicode, Geneva, Verdana, sans-serif;
            background-color:#ece7ff;
        }
        
        label{
            text-align:center;
            display: block;
            align-items:center;
            padding:5px;
        }
        input{
            align-items:center;
            text-align:center;
            border-radius: 8px;
            width: 55%;
            height:15px;
        }
        form{
            align-items:center;
            display: block;
            text-align:center;
        }

        button{
            align-items:center;
            margin: 10px;    
            background-color: #8ba9cd;
            font-size: 15px;
            width: 15%;
            height: 30px;
            border-radius: 8px;
            font-family: Lucida Sans, Lucida Sans Regular, Lucida Grande, Lucida Sans Unicode, Geneva, Verdana, sans-serif;
        }

        h1{
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    </style>
</head>
<body>
    <h1>°°Login°°</h1>
    <p>Olá, realize seu login para acessar nossos conteúdos!</p>
    <form action="index.php" method="post">

        <label for="usuario">Usuário</label>
        <input name="usuario" type="text" required>
        <span class="erro">* <?php if (!empty($erroUsuario)) { echo $erroUsuario; } ?></span>

        <br>

        <label for="email">E-mail</label>
        <input name="email" type="email" required>
        <span class="erro">* <?php if (!empty($erroEmail)) { echo $erroEmail; } ?></span>

        <br>

        <label for="senha">Senha</label>
        <input name="senha" type="password" required>
        <span class="erro">* <?php if (!empty($erroSenha)) { echo $erroSenha; } ?></span>

        <br>


        <button type="submit">Enviar</button>
    </form>

    <p><?php echo $resultado; ?></p>
</body>
</html>