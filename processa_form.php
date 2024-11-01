<?php

    define ('HOST', 'localhost');
    define ('USER', 'root');
    define ('PASS', '');
    define ('BASE', 'projetohe');

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

    var_dump($options);


    

// formulario

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Método POST detectado.<br>";
    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $titulo = $_POST['titulo'];
        $desc = $_POST['desc'];
        $categoria = $_POST['categoria'];


        $sql_categoria = "INSERT INTO categoria(nome) VALUES ('$categoria') ON DUPLICATE KEY UPDATE id_categoria=id_categoria";
        if (!mysqli_query($conn, $sql_categoria)) {
            echo "Erro ao inserir categoria: " . mysqli_error($conn);
            exit;
        }
        $id_categoria = mysqli_insert_id($conn);

        $sql_descricao = "INSERT INTO descricao(descricao) VALUES ('$desc') ON DUPLICATE KEY UPDATE id_descricao=id_descricao"; 
        if (!mysqli_query($conn, $sql_descricao)) {
            echo "Erro ao inserir descrição: " . mysqli_error($conn);
            exit;
        }
        $id_descricao = mysqli_insert_id($conn);



    $sql_titulo = "INSERT INTO titulo(titulo, id_categoria, id_descricao) VALUES ('$titulo', '$id_categoria', '$id_descricao')"; 
    if (!mysqli_query($conn, $sql_titulo)) {
        echo "Erro ao inserir título: " . mysqli_error($conn);
    }
    }else{
        echo "ERRO ao enviar ";
    }
}

    $conn->close();
?>

