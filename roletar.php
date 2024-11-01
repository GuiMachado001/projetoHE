<?php

    define ('HOST', 'localhost');
    define ('USER', 'root');
    define ('PASS', '');
    define ('BASE', 'projetohe');

    $conn = new mysqli('localhost', 'root', 'suporte@22', 'projetohe');


    // Verificar conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
    
    // buscar titulo
    function buscarTituloAleatorio($conn) {
        $sql = "SELECT titulo.titulo, descricao.descricao, categoria.nome 
                FROM categoria 
                INNER JOIN titulo 
                ON categoria.id_categoria = titulo.id_categoria 
                INNER JOIN descricao ON descricao.id_descricao = titulo.id_descricao
                ORDER BY RAND() LIMIT 1"; 
        $query = $conn->query($sql);
        
        if ($query && $query->num_rows > 0) {
            return $query->fetch_assoc(); 
        } else {
            return null; 
        }
    }
    
    $tituloAleatorio = null;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $tituloAleatorio = buscarTituloAleatorio($conn);
    }
    
    $conn->close();
    ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style/roletagem.css">

</head>
<body>
    <div class="containerBox">
        <div class="containerOrganizacional">

            
            <div class="containerTitulo">
                <h1>Titulo:</h1>
                <div class="resposta">
                    <?php 
                    if ($tituloAleatorio): ?>
                    <p><?php echo htmlspecialchars($tituloAleatorio['titulo']); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="containerDesc">
                <h1>Descrição: </h1>
                <div class="respostaDesc">
                    <?php 
                    if ($tituloAleatorio): ?>
                    <p><?php echo htmlspecialchars($tituloAleatorio['descricao']); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="containerCategoria">
                <h1>Categoria: </h1>
                <div class="resposta">
                    <?php if ($tituloAleatorio): ?>
                        <p><?php echo htmlspecialchars($tituloAleatorio['nome']); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                
                
                <div class="containerRoletar">
                    <form method="POST">
                        <a href="cadastroTitulo.php" class="BtnVoltar">Voltar</a>
                        <button type="submit" class="BtnRoletar">Roletar</button>
                    </form>
                </div>
        </div>
    </div>
</body>
</html>