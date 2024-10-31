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

        <form action="processa_form.php" method="POST" >

            <div class="containerTitulo">
                <label for="titulo" class="tituloLbl">Titulo:</label>
                <input type="text" name="titulo" id="titulo" >
            </div>
            
            <div class="containerDesc">
                <label for="desc" class="descLbl">Descrição</label>
                <textarea name="desc" id="desc" cols="" rows="20" ></textarea>
            </div>
                
            <div class="containerCategoria">
                <label for="categoria" class="categoriaLbl">Categoria:</label>

                <select name="categoria" id="categoria">
                    <option value="Opcao1" class="opcaoCategoria">Opção 1</option>
                    <option value="Opcao2" class="opcaoCategoria">Opção 2</option>
                    <option value="Opcao3" class="opcaoCategoria">Opção 3</option>
                    <option value="Opcao4" class="opcaoCategoria">Opção 4</option>
                </select>
            </div>

            <div class="containerBtn">
                <a class="roletarBtn">Roletar</a>
                <a class="cadastroCategoriaBtn" href="cadastroCategoria.php">Cadastrar Categoria</a>
                <input type="submit" value="Cadastrar">
            </div>

        </form>

   </div>
</body>
</html>