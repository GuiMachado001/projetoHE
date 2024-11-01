<?php

define ('HOST', 'localhost');
define ('USER', 'root');
define ('PASS', 'suporte@22');
define ('BASE', 'projetohe');

try {
    $pdo = new PDO("mysql:host=".HOST.";dbname=".BASE, USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Conexão falhou: " . $e->getMessage());
}

function acharEmail($pdo, $email) {
    $sql = $pdo->prepare("SELECT id_usuario, senha FROM usuario WHERE email = :m");
    $sql->bindValue(":m", $email);
    $sql->execute();

    return $sql->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Login</title>

    <link rel="stylesheet" href="style/login.css">

</head>
<body>
    <div class="containerGeral">
        <div class="containerImg">
            <img src="img/logo.png" alt="">
        </div>
        <form action="" method="POST">

            <div class="containerEmail">
                <label >Usuário:</label>
                <input type="email" name="email" placeholder="Digite seu E-mail"><br><br>
            </div>
            
            <div class="containerPass">
                <label>Senha:</label>
                <input type="password" name="senha" placeholder="Digite sua Senha"><br><br>
            </div>
            
            <div class="containerButtons">
                <input type="submit" value="logar" class="inpLogar"><br><br>
                <a href="cadastroTitulo.php" class="Cadastrar">Cadastre-se</a>
            </div>
        </form>
    </div>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (!empty($email) && !empty($senha)) {
        $usuario = acharEmail($pdo, $email); // Chama a função

        // Adicione esta linha para ver o que está sendo retornado
        var_dump($usuario);

        if ($usuario) {
            // Comparar diretamente, já que as senhas não estão hashadas
            if ($senha === $usuario['senha']) {
                header("Location: cadastroTitulo.php");
                exit();
            } else {
                echo "<p>Senha incorreta.</p>";
            }
        } else {
            echo "<p>Email ou senha incorretos.</p>";
        }
    } else {
        echo "<p>Por favor, preencha todos os campos.</p>";
    }
}
?>
</body>
</html>