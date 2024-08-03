<?php
require_once(__DIR__ . '/../configuration/database_conection.php');

class BooksModel extends Connect
{
    private $table;

    function __construct()
    {
        parent::__construct("localhost", "db_biblioteca", "root", "");
        $this->table = 'tb_livros';
    }

    // LISTAR LIVROS
    function books_list()
    {
        $sql = "SELECT liv_codigo, liv_ano_publicacao, liv_descricao, liv_titulo, aut_nome FROM $this->table 
                JOIN tb_autores ON liv_aut_codigo = aut_codigo";
        $result = $this->connection->query($sql);
        // ARMAZENA OS LIVROS
        $books = $result->fetch_all(MYSQLI_ASSOC);
        // FECHA A CONEXÃO COM O BANCO
        $this->connection->close();
        // RETORNA OS LIVROS
        return $books;
    }

    // CRIAR LIVRO
    function books_create($titulo, $ano_pub, $autor_id, $descricao)
    {
        $titulo = $this->connection->real_escape_string($titulo);
        $descricao = $this->connection->real_escape_string($descricao);
        $ano_pub = intval($ano_pub);
        $autor_id = intval($autor_id);

        $sql = "INSERT INTO " . $this->table . " (liv_titulo, liv_ano_publicacao, liv_aut_codigo, liv_descricao) VALUES ('$titulo', '$ano_pub', '$autor_id', '$descricao')";

        if ($this->connection->query($sql) === TRUE) {
            return "Novo autor criado com sucesso.";
        } else {
            return "Erro: " . $sql . "<br>" . $this->connection->error;
        }
    }

    // DELETAR LIVRO
    function books_delete($id)
    {
        $id = intval($id);
        $sql = "DELETE FROM $this->table WHERE liv_codigo = $id";

        if ($this->connection->query($sql) === TRUE) {
            return "Autor deletado";
        } else {
            return "Erro: " . $sql . "<br>" . $this->connection->error;
        }
    }

    // ATUALIZAR LIVRO
    function books_update($titulo, $ano_pub, $autor_id, $descricao, $id)
    {
        $titulo = $this->connection->real_escape_string($titulo);
        $descricao = $this->connection->real_escape_string($descricao);
        $ano_pub = intval($ano_pub);
        $autor_id = intval($autor_id);
        $id = intval($id);

        $sql = "UPDATE $this->table SET 
        liv_titulo = '$titulo', 
        liv_ano_publicacao = '$ano_pub', 
        liv_aut_codigo = '$autor_id', 
        liv_descricao = '$descricao'
        WHERE liv_codigo = $id";

        // A QUERY ESTÁ SENDO EXECUTADA NO IF
        if ($this->connection->query($sql) === TRUE) {
            return "Autor deletado";
        } else {
            return "Erro: " . $sql . "<br>" . $this->connection->error;
        }
    }

    // PEGAR UM ÙNICO LIVRO
    function book_get($id)
    {
        $id = intval($id);
        $sql = "SELECT * FROM $this->table WHERE aut_codigo = $id";
        $result = $this->connection->query($sql);
        $book = $result->fetch_array(MYSQLI_ASSOC);
        $this->connection->close();
        return $book;
    }
};
