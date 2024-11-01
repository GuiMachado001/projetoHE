<?php

define ('HOST', 'localhost');
define ('USER', 'root');
define ('PASS', '');
define ('BASE', 'projetohe');

$conn = new mysqli('localhost', 'root', 'suporte@22', 'projetohe');

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nomeCategoria = $conn->real_escape_string($_POST['nomeCat']);
        

        $sql_cadastrar_Categoria = "INSERT INTO categoria(nome) VALUE ('$nomeCategoria')";
        if ($conn->query($sql_cadastrar_Categoria) === TRUE) {
            echo "<h2>Categoria cadastrada: $nomeCategoria</h2>";
        } else {
            echo "Erro ao cadastrar categoria: " . $conn->error;
        }


        echo "<h2>Titulo: $nomeCat</h2>";

    }else{
        echo "ERRO ao enviar";
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Categoria</title>

    <link rel="stylesheet" href="style/cadastrarCategoria.css">

</head>
<body>

    <!-- <?php include 'processa_cadastro.php'; ?> -->

    <div class="containerBox">
        <form action="" method="POST">
            <div class="containerTile">
                <h1>Cadastrar Categoria</h1>
            </div>

            <div class="containerNomeCategoria">
                <label for="nomeCat" class="nomeCat">Nome da Categoria:</label>
                <input type="text" name="nomeCat" id="nomeCat" >
            </div>

            <div class="containerBtn">
                <a class="voltarBtn" href="cadastroTitulo.php">Voltar</a>
                <button class="cadastroCategoriaBtn" href="cadastroTitulo.php">Cadastrar Categoria</button>
            </div>
        </form>
    </div>
</body>
</html>