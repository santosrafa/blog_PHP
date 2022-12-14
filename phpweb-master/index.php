<?php

    /* ---É obrigatorio que o arquivo config.php exista--- */
    require 'config.php';

    /* ---Buscado o arquivo que esta em outro local--- */
    include 'src/Artigo.php';

    $artigo = new Artigo($mysql);
    $artigos = $artigo->exibirTodos();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meu Blog</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div id="container">
        <h1>Meu Blog</h1>
        <?php foreach ($artigos as $artigo) : ?>
            <h2>
                <a href= "artigo.php?id=<?php echo $artigo['id']; ?>">
                    <?php echo $artigo['titulo']; ?>
                </a>
            </h2>
            <p>
                <!-- --nl2br utilizado para quebra de linha-- -->
                <?php echo nl2br($artigo['conteudo']); ?>
            </p>
        <?php endforeach; ?>
    </div>
</body>

</html>