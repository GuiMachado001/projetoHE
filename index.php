<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto HE</title>

    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<!-- <?php include 'processa_form.php'; ?> -->

    <div class="containerBox">

        <form action="processa_form.php" method="POST" >

            <div class="containerTitulo">
                <label for="titulo" class="tituloLbl">Titulo:</label>
                <input type="text" name="titulo" id="titulo" required>
            </div>
            
            <div class="containerDesc">
                <label for="desc" class="descLbl">Descrição</label>
                <textarea name="desc" id="desc" cols="" rows="20" required></textarea>
            </div>
                
            <div class="containerCategoria">
            <label for="categoria" class="categoriaLbl" required>Categoria:</label>

                <select name="categoria" id="categoria">
                    <?php echo $options; ?>
                </select>
            </div>

            <div class="containerBtn">
                <a class="roletarBtn" href="roletar.php">Roletar</a>
                <a class="cadastroCategoriaBtn" href="cadastroCategoria.php">Cadastrar Categoria</a>
                <input type="submit" value="Cadastrar">
            </div>

        </form>

   </div>
</body>
</html>