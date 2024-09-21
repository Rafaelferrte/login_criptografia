<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página PHP</title>
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
            <button type="submit" name="acao" value="adicionar">Adicionar</button>
        </form>

        <?php
        session_start();

        // Inicializa o array de músicas na sessão, se ainda não estiver definido
        if (!isset($_SESSION['musicas'])) {
            $_SESSION['musicas'] = [];
        }

        // Verifica se o formulário foi enviado com a ação de adicionar
        if (isset($_POST["acao"]) && $_POST["acao"] === "adicionar") {
            $musicaAdd = $_POST["campo_lista_musica"];

            array_unshift($_SESSION['musicas'], $musicaAdd);
        }

        // Verifica se foi enviado um pedido de remoção de uma música
        if (isset($_POST["acao"]) && $_POST["acao"] === "remover") {

            $indiceRemover = $_POST["indice"];
            // Remove a música do array da sessão
            array_splice($_SESSION['musicas'], $indiceRemover, 1);
        }

        // Função para exibir a lista de músicas com opção de remover
        function mostrarLista($musicas) {
            if (count($musicas) >= 1) {
                echo "<h3>Sua lista de músicas:</h3>";
                echo "<ul>";
                foreach ($musicas as $indice => $musica) {
                    echo "<li>" . $musica . " 
                        <form action='' method='post' style='display:inline;'>
                            <input type='hidden' name='indice' value='" . $indice . "'>
                            <button type='submit' name='acao' value='remover'>Remover</button>
                        </form>
                    </li>";
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
