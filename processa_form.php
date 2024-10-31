<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $titulo = ($_POST['titulo']);
        $desc = ($_POST['desc']);
        $categoria = ($_POST['categoria']);

        echo "<h2>Titulo: $titulo</h2>";
        echo "<h2>Descrição: $desc</h2>";
        echo "<h2>Categoria: $categoria</h2>";
    }else{
        echo "ERRO ao enviar";
    }

?>