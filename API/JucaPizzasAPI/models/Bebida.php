<?php
class Bebida {    
    private $conn;
    private $tabela = 'bebidas';
    public $idBebida;
    public $nome;
    public $ingredientes;
    public $icAlcoolico;
    public $valor;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll()
    {
        //Salvando a query em SQL em uma variável
        $query = "SELECT idBebida, nome, ingredientes, icAlcoolico, valor FROM {$this->tabela}";

        //Preparando a query para ser excutada, ou seja, vinculando ela à conexão
        $stmt = $this->conn->prepare($query);

        $stmt->execute(); //Executando a query no BD
        return $stmt;
    }

    public function get()
    {
        $query = "SELECT idBebida, nome, ingredientes, icAlcoolico, valor
                    FROM {$this->tabela}
                    WHERE idBebida = ?
                    LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->idBebida);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $this->nome = $row['nome'];
        $this->ingredientes = $row['ingredientes'];
        $this->icAlcoolico = $row['icAlcoolico'];
        $this->valor = $row['valor'];
    }
}

?>