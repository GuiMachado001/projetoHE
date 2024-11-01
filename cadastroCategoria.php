<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Categoria</title>

    <link rel="stylesheet" href="style/cadastrarCategoria.css">

</head>
<body>

    <?php include 'processa_cadastro.php'; ?>

    <div class="containerBox">
        <form action="processa_cadastro.php" method="POST">
            <div class="containerTile">
                <h1>Cadastrar Categoria</h1>
            </div>

            <div class="containerNomeCategoria">
                <label for="nomeCat" class="nomeCat">Nome da Categoria:</label>
                <input type="text" name="nomeCat" id="nomeCat" >
            </div>

            <div class="containerBtn">
                <a class="voltarBtn" href="index.php">Voltar</a>
                <button class="cadastroCategoriaBtn" href="cadastroCategoria.php">Cadastrar Categoria</button>
            </div>
        </form>
    </div>
</body>
</html>