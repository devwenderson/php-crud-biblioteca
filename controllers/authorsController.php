<?php
require_once(__DIR__ . '/../models/authorsModel.php');

class AuthorsController {
    private $model;

    function __construct()
    {
        $this->model = new AuthorsModel();
    }

    // CHAMA A FUNÇÃO PARA LISTAR AUTORES
    function authors_list()
    {
        $authors = $this->model->authors_list();
        return $authors;
    }

    // CHAMA A FUNÇÃO DE CRIAR AUTOR
    function authors_create($nome)
    {
        $this->model->authors_create($nome);
    }

    function authors_delete($id)
    {
        $result = $this->model->authors_delete($id);
        return $result;
    }

    function authors_update($id, $nome)
    {
        $this->model->authors_update($id, $nome);
    }

    function author_get($id)
    {
        $author = $this->model->author_get($id);
        return $author;
    }
}

?>
