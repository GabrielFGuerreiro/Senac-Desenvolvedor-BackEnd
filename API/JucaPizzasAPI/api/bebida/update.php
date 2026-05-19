<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
 
include_once '../../config/Database.php';
include_once '../../models/Bebida.php';
 
// Instanciar o banco de dados e conectar
$database = new Database();
$db = $database->getConnection();
 
// Instanciar o objeto Bebida
$bebida = new Bebida($db);
 
if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    try {
        // Obter os dados postados
        $data = json_decode(file_get_contents("php://input"));
 
        // Verificar se os dados não estão vazios e se o ID foi fornecido
        if (
            !empty($data->nome) && !empty($data->ingredientes) &&
            isset($data->icAlcoolico) && !empty($data->valor)
        ) {
            // Atribuir o ID para atualização
            $bebida->idBebida = $data->id; //é o que vem pelo json
 
            // Atribuir os demais valores
            $bebida->nome = $data->nome;
            $bebida->ingredientes = $data->ingredientes;
            $bebida->valor = $data->valor;
            $bebida->icAlcoolico = $data->icAlcoolico;
 
            // Tentar atualizar a bebida
            if ($bebida->update()) {
                http_response_code(200);
                // Resposta de sucesso    
                echo json_encode(
                    array('Mensagem' => 'Bebida Atualizada com Sucesso')
                );
            } else {
                http_response_code(500);
                // Resposta de erro
                echo json_encode(
                    array('Mensagem' => 'Não foi possivel atualizar a Bebida')
                );
            }
        } else {
            // Resposta se dados estiverem incompletos
            http_response_code(400);
            echo json_encode(
                array('Mensagem' => 'Dados Incompletos. Não foi possivel atualizar a Bebida.')
            );
        }
    } catch (Exception $e) {        
        echo json_encode(array("erro" => $e->getMessage()));
    }
} else {
    http_response_code(405);
    echo json_encode(array("erro" => "Método não suportado!"));
}
 