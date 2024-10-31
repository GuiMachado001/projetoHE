<?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nomeCat = ($_POST['nomeCat']);


        echo "<h2>Titulo: $nomeCat</h2>";

    }else{
        echo "ERRO ao enviar";
    }

?>