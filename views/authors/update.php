<?php
require_once(__DIR__ . '/../../controllers/authorsController.php');
$id = intval($_GET['id']);
$controller = new AuthorsController();
$author = $controller->author_get($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $controller->authors_update($id, $nome);
    header('Location: list.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar <?php echo $author['aut_nome']; ?></title>
</head>

<body>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $author['aut_codigo']; ?>">

        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control" id="name" name="nome" value="<?php echo $author['aut_nome']; ?>">

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="list.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>

</html>