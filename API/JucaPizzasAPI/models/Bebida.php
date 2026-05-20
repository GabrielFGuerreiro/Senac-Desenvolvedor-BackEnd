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

    public function add()
    {
        $query = 'INSERT INTO ' . $this->tabela . ' SET nome = :nome, ingredientes = :ingredientes, icAlcoolico = :icAlcoolico, valor = :valor';

        // Preparar a query
        $stmt = $this->conn->prepare($query);
 
        // Limpar os dados
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->ingredientes = htmlspecialchars(strip_tags($this->ingredientes));
        $this->icAlcoolico = htmlspecialchars(strip_tags($this->icAlcoolico));
        $this->valor = htmlspecialchars(strip_tags($this->valor));
 
        // Vincular os parâmetros
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':ingredientes', $this->ingredientes);
        $stmt->bindParam(':icAlcoolico', $this->icAlcoolico);
        $stmt->bindParam(':valor', $this->valor);
 
        // Executar a query
        if ($stmt->execute()) {
            return true;
        }        
        return false;       
    }

    public function update() {
        // Query de atualização
        $query = 'UPDATE ' . $this->tabela . ' SET nome=:nome, ingredientes=:ingredientes, icAlcoolico=:icAlcoolico, valor=:valor WHERE idBebida=:id';
 
        // Preparar a query
        $stmt = $this->conn->prepare($query);
 
        // Limpar os dados
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->ingredientes = htmlspecialchars(strip_tags($this->ingredientes));
        $this->icAlcoolico = htmlspecialchars(strip_tags($this->icAlcoolico));
        $this->valor = htmlspecialchars(strip_tags($this->valor));
 
        // Vincular os parâmetros
        $stmt->bindParam(':id', $this->idBebida);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':ingredientes', $this->ingredientes);
        $stmt->bindParam(':icAlcoolico', $this->icAlcoolico);
        $stmt->bindParam(':valor', $this->valor);
 
        // Executar a query
        if($stmt->execute()) {
            return true;
        }
     
        return false;
    }

    public function delete()
    {
        $query = "DELETE FROM {$this->tabela} WHERE idBebida =:id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $this->idBebida);

        if($stmt->execute())
        {
            return true;
        }
        return false;
    }
}

?>