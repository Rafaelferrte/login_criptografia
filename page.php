<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Página PHP com Imagens Automáticas</title>
</head>
<body>
    <header>
        <h1>Bem-vindo!</h1>
        <p>Esta é uma página criptografada.</p>
    </header>

    <main>
        <form action="" method="post">
            <label for="lista_musica">Adicione uma música à sua lista</label><br>
            <input type="text" name="campo_lista_musica" id="lista_musica"><br>

            <label for="cantor">Adicione o cantor da música</label><br>
            <input type="text" name="campo_cantor" id="cantor"><br>

            <button type="submit" name="acao" value="adicionar">Adicionar</button>
        </form>

        <?php
        session_start();

        if (!isset($_SESSION['musicas'])) {
            $_SESSION['musicas'] = [];
        }

        function musicaExiste($musica, $listaMusicas) {
            foreach ($listaMusicas as $item) {
                if (in_array($musica, $item)) {
                    return true;
                }
            }
            return false;
        }

        function adicionarMusica($musica, $cantor) {
            global $_SESSION;

            $imagem = "./imgs/music.jpg"; 

            if (!musicaExiste($musica, $_SESSION['musicas'])) {
                array_unshift($_SESSION['musicas'], [
                    'musica' => $musica,
                    'cantor' => $cantor,
                    'imagem' => $imagem
                ]);
            } else {
                echo "<p>A música já está na lista!</p>";
            }
        }

        function removerMusica($indice) {
            global $_SESSION;
            array_splice($_SESSION['musicas'], $indice, 1);
        }

        if (isset($_POST["acao"]) && $_POST["acao"] === "adicionar") {
            $musicaAdd = $_POST["campo_lista_musica"];
            $cantorAdd = $_POST["campo_cantor"];

            adicionarMusica($musicaAdd, $cantorAdd);
        }

        if (isset($_POST["acao"]) && $_POST["acao"] === "remover") {
            $indiceRemover = $_POST["indice"];
            removerMusica($indiceRemover);
        }

        function mostrarLista($musicas) {
            if (count($musicas) >= 1) {
                echo "<h3>Sua lista de músicas:</h3>";
                echo "<ul>";
                foreach ($musicas as $indice => $item) {
                    echo "<li>" . $item['musica'] . " - " . $item['cantor'] . "<br>";
                    echo "<img src='" . $item['imagem'] . "' alt='Imagem de " . $item['musica'] . "' style='width:100px;height:auto;'><br>";
                    echo "
                        <form action='' method='post' style='display:inline;'>
                            <input type='hidden' name='indice' value='" . $indice . "'>
                            <button type='submit' name='acao' value='remover'>Remover</button>
                        </form>
                    </li><br>";
                }
                echo "</ul>";
            } else {
                echo "<p>Sua lista não tem músicas adicionadas.</p>";
            }
        }

        // Chama a função para mostrar a lista de músicas armazenadas na sessão
        mostrarLista($_SESSION['musicas']);
        ?>
    </main>
</body>
</html>
