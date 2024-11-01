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


        // echo "<h2>Titulo: $nomeCat</h2>";

    }else{
        echo "ERRO ao enviar";
    }

?>