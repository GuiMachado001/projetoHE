<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto HE</title>

    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="containerBox">

        <form action="processa_form.php" method="POST">

            <div class="containerTitulo">
                <label for="titulo">Titulo:</label>
                <input type="text" name="titulo" id="titulo" required>
            </div>
            
            <div class="containerDesc">
                <label for="desc">Descrição</label>
                <textarea name="desc" id="desc" cols="" rows="20" required></textarea>
            </div>
                
            <div class="containerCategoria">
                <label for="categoria">Categoria:</label>

                <select name="categoria" id="categoria">
                    <option value="Opcao1" class="opcaoCategoria">Opção 1</option>
                    <option value="Opcao2" class="opcaoCategoria">Opção 2</option>
                    <option value="Opcao3" class="opcaoCategoria">Opção 3</option>
                    <option value="Opcao4" class="opcaoCategoria">Opção 4</option>
                </select>
            </div>

            <div class="containerBtn">
                <input type="submit" value="Enviar">
            </div>

        </form>

   </div>
</body>
</html>