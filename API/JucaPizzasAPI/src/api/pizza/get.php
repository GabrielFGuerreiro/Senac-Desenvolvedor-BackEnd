<?php

//CRIAÇÃO ROTA GET.PHP
// Headers obrigatórios
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8"); 

require __DIR__ . '/../../../vendor/autoload.php';
 
use Gfg\Jucapizzasapi\Models\Pizza;
use Gfg\Jucapizzasapi\Config\Database;

// Instanciar o objeto Database e obter a conexão
$database = new Database();
$db = $database->getConnection(); 

// Instanciar o objeto Pizza
$pizza = new Pizza($db); 
$pizza->idPizza = isset($_GET['id']) ? $_GET['id'] : null;
 
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if ($pizza->idPizza) {
        // Busca a pizza
        $pizza->get(); 
        if($pizza->nome == null) 
        {
            http_response_code(404);
            echo json_encode(array("Erro" => "Pizza não encontrada."));
            exit();
        }
        // Cria o array de resposta
        $pizza_arr = array(
            "id" => $pizza->idPizza,
            "nome" => $pizza->nome,
            "ingredientes" => $pizza->ingredientes,
            "valor" => $pizza->valor
        ); 

        // Converte para JSON e envia a resposta
        // `JSON_PRETTY_PRINT` é opcional, mas deixa o JSON mais legível
        echo json_encode($pizza_arr, JSON_PRETTY_PRINT);
    } else {
        http_response_code(400);
        echo json_encode(
            array("Erro" => "Id não informado.")
        );
    }
}
else {
    http_response_code(405);
    echo json_encode(
        array("Erro" => "Método não permitido.")
    );
}

 
