<?php
require_once(__DIR__ . '/../../controllers/authorsController.php');
require_once(__DIR__ . '/../../controllers/booksController.php');

$authorsController = new AuthorsController();
$booksController = new BooksController();

$authors = $authorsController->authors_list();

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $ano_pub = intval($_POST['ano-pub']);
    $autor_id = intval($_POST['autor']);

    $booksController->books_create($titulo, $ano_pub, $autor_id, $descricao);
    header('Location: list.php');
    exit;
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar livro</title>
</head>

<body>
    <form action="./create.php" method="POST">

        <label for="titulo">Título</label>
        <input type="text" name="titulo">

        <label for="ano_pub">Ano</label>
        <input type="number" name="ano-pub">

        <label for="descricao">Descrição</label>
        <input type="text" name="descricao">

        <select name="autor">
            <option value="">Selecione o autor</option>
            <?php foreach ($authors as $author) : ?>
                <option value="<?php echo $author['aut_codigo'] ?>"> <?php echo $author['aut_nome'] ?> </option>
            <?php endforeach ?>
        </select>

        <button type="submit">Cadastrar</button>
    </form>
</body>

</html>