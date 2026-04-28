<?php

class Database {

    private $host = "localhost";
    private $db_name = "JUCA_PIZZAS";
    private $username = "root";
    private $password = "usbw";
    private $port = "3310";

    public $conn;

    public function getConnection() {
        $this->conn = null; //Verificar se a conexão já existe. Se sim, reseta a instancia para null.

        try //Tenta executar um código potencialmente perigoso.
        { 
            //DSN (Data Source Name) é uma string que contém as informações necessárias para se conectar ao banco de dados.
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->db_name};charset=utf8";
            $this->conn = new PDO($dsn, $this->username, $this->password); //Cria uma nova conexão PDO usando o DSN e as credenciais fornecidas.

            //Define o modo de erro do PDO para exceção
            //Isso faz com que o PDO lance exceções em caso de erros, facilitando o tratamento
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(Exception $e) //Em caso de erro na conexão, exibe a messagem de erro.
        { 
            echo "Erro de conexão: " . $e->getMessage();
        }
        return $this->conn;
    }
}