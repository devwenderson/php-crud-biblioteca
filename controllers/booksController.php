<?php
require_once(__DIR__ . '/../models/booksModel.php');

class BooksController {
    private $model;

    function __construct()
    {
        $this->model = new BooksModel();
    }

    // CHAMA A FUNÇÃO PARA LISTAR AUTORES
    function books_list()
    {
        $books = $this->model->books_list();
        return $books;
    }

    // CHAMA A FUNÇÃO DE CRIAR LIVRO
    function books_create($titulo, $ano_pub, $autor_id, $descricao)
    {
        $this->model->books_create($titulo, $ano_pub, $autor_id, $descricao);
    }

    function books_delete($id)
    {
        $result = $this->model->books_delete($id);
        return $result;
    }

    function books_update($titulo, $ano_pub, $autor_id, $descricao, $id)
    {
        $this->model->books_update($titulo, $ano_pub, $autor_id, $descricao, $id);
    }

    function book_get($id)
    {
        $book = $this->model->book_get($id);
        return $book;
    }
}

?>
