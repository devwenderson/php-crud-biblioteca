<?php
require_once(__DIR__ . '/../../controllers/authorsController.php');
require_once(__DIR__ . '/../../controllers/booksController.php');
$booksController = new BooksController();
$authorsController = new AuthorsController();

$books = $booksController->books_list();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <div>
            <a href="./create.php">Cadastrar livro</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TÍTULO</th>
                    <th>ANO</th>
                    <th>AUTOR</th>
                    <th>OPÇÃO</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($books as $book) : ?>
                    <tr>
                        <td><?php echo $book['liv_codigo'] ?></td>
                        <td><?php echo $book['liv_titulo'] ?></td>
                        <td><?php echo $book['liv_ano_publicacao'] ?></td>
                        <td><?php echo $book['aut_nome'] ?></td>
                        <td class="d-flex">
                            <?php include('delete.php'); ?>
                            <a href="update.php?id=<?php echo $book['liv_codigo'] ?>">Editar</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>