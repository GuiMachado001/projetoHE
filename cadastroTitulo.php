<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('BASE', 'projetohe');

$conn = new mysqli('localhost', 'root', 'suporte@22', 'projetohe');


if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// categorias do BD
$sql = "SELECT id_categoria, nome FROM categoria";
$resultado = $conn->query($sql);

$options = "";

if ($resultado && $resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $options .= '<option value="' . htmlspecialchars($row['id_categoria']) . '">' . htmlspecialchars($row['nome']) . '</option>';
    }
} else {
    $options .= '<option value="">Nenhuma categoria encontrada</option>';
}

// formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = mysqli_real_escape_string($conn, $_POST['titulo']);
    $desc = mysqli_real_escape_string($conn, $_POST['desc']);
    $categoria = mysqli_real_escape_string($conn, $_POST['categoria']);

    // Verifica se a categoria já existe
    if ($categoria) {
        // Aqui assumimos que o id_categoria é enviado no select, então não é necessário inserir uma nova categoria
        $sql_descricao = "INSERT INTO descricao(descricao) VALUES ('$desc')"; 
        if (!mysqli_query($conn, $sql_descricao)) {
            echo "Erro ao inserir descrição: " . mysqli_error($conn);
            exit;
        }
        $id_descricao = mysqli_insert_id($conn);

        $sql_titulo = "INSERT INTO titulo(titulo, id_categoria, id_descricao) VALUES ('$titulo', '$categoria', '$id_descricao')";
        if (mysqli_query($conn, $sql_titulo)) {
            echo "Título cadastrado com sucesso!";
        } else {
            echo "Erro ao inserir título: " . mysqli_error($conn);
        }
    } else {
        echo "Por favor, selecione uma categoria.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto HE</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="containerBox">
        <form action="" method="POST">
            <div class="containerTitulo">
                <label for="titulo" class="tituloLbl">Título:</label>
                <input type="text" name="titulo" id="titulo" required>
            </div>
            
            <div class="containerDesc">
                <label for="desc" class="descLbl">Descrição</label>
                <textarea name="desc" id="desc" cols="" rows="20" required></textarea>
            </div>
                
            <div class="containerCategoria">
                <label for="categoria" class="categoriaLbl">Categoria:</label>
                <select name="categoria" id="categoria" required>
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
