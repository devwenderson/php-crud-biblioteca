<?php
require_once(__DIR__ . '/../configuration/database_conection.php');

class AuthorsModel extends Connect
{
    private $table;

    function __construct()
    {
        parent::__construct("localhost", "db_biblioteca", "root", "");
        $this->table = 'tb_autores';
    }

    // LISTAR AUTORES
    function authors_list()
    {
        $sql = "SELECT * FROM $this->table";
        $result = $this->connection->query($sql);
        $authors = $result->fetch_all(MYSQLI_ASSOC);;
        $this->connection->close();
        return $authors;
    }

    // CRIAR AUTOR
    function authors_create($nome)
    {
        $nome = $this->connection->real_escape_string($nome);
        $sql = "INSERT INTO " . $this->table . " (aut_nome) VALUES ('$nome')";

        if ($this->connection->query($sql) === TRUE) {
            return "Novo autor criado com sucesso.";
        } else {
            return "Erro: " . $sql . "<br>" . $this->connection->error;
        }
    }

    // DELETAR AUTOR
    function authors_delete($id)
    {
        $id = intval($id);
        $sql = "DELETE FROM $this->table WHERE aut_codigo = $id";

        if ($this->connection->query($sql) === TRUE) {
            return "Autor deletado";
        } else {
            return "Erro: " . $sql . "<br>" . $this->connection->error;
        }
    }

    // ATUALIZAR AUTOR
    function authors_update($id, $nome)
    {
        $id = intval($id);
        $nome = $this->connection->real_escape_string($nome);
        $sql = "UPDATE $this->table SET aut_nome = '$nome' WHERE aut_codigo = $id";

        // A QUERY ESTÁ SENDO EXECUTADA NO IF
        if ($this->connection->query($sql) === TRUE) {
            return "Autor deletado";
        } else {
            return "Erro: " . $sql . "<br>" . $this->connection->error;
        }
    }

    // PEGAR UM ÙNICO AUTOR
    function author_get($id)
    {
        $id = intval($id);
        $sql = "SELECT * FROM $this->table WHERE aut_codigo = $id";
        $result = $this->connection->query($sql);
        return $result->fetch_array(MYSQLI_ASSOC);

    }
};
