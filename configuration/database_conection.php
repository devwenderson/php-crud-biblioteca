<?php
class Connect {
    protected $connection;
    private $servername;
    private $database;
    private $username;
    private $password;

    function __construct($servername, $database, $username, $password)
    {
        $this->servername = $servername;    
        $this->database = $database;    
        $this->username = $username;    
        $this->password = $password;
        // O código abaixo tem que estar por último
        // Caso contrário, dará erro    
        $this->connect_database(); 
    }

    function connect_database()
    {
        $this->connection = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
        if (!$this->connection) {
            die("Connection failed: " . mysqli_connect_error());   
        }
        // echo "Connected";
    }
};
?>