<?php
class Pizza {    
    private $conn;
    private $tabela = 'pizzas';
    public $idPizza;
    public $nome;
    public $ingredientes;
    public $valor;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll()
    {
        //Salvando a query em SQL em uma variável
        $query = "SELECT idPizza, nome, ingredientes, valor FROM {$this->tabela}";

        //Preparando a query para ser excutada, ou seja, vinculando ela à conexão
        $stmt = $this->conn->prepare($query);

        $stmt->execute(); //Executando a query no BD
        return $stmt;
    }

    public function get()
    {
        $query = "SELECT idPizza, nome, ingredientes, valor
                    FROM {$this->tabela}
                    WHERE idPizza = ?
                    LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idPizza);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $this->nome = $row['nome'];
        $this->ingredientes = $row['ingredientes'];
        $this->valor = $row['valor'];
    }
}

?>