<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
 
include_once '../../config/Database.php';
include_once '../../models/Pizza.php';

$db = new Database();

$conn = $db->getConnection();

$pizza = new Pizza($conn);

if($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
    try
    {
        $data = json_decode(file_get_contents("php://input"));
        if (!empty($data->id))
        {
            $pizza->idPizza = $data->id;
            $pizza->get(); 
            if($pizza->nome == null) 
            {
                http_response_code(404);
                echo json_encode(array("Erro" => "Pizza não encontrada."));
                exit();
            }
            
            if ($pizza->delete()) {
                http_response_code(201);

                echo json_encode(
                    array('Mensagem' => 'Pizza Deletada com Sucesso')
                );
            }
            else
            {
                http_response_code(500);

                echo json_encode(
                    array('Mensagem' => 'Não foi possivel Deletar a Pizza')
                );
            }
        }
        else
        {
            http_response_code(400);

            echo json_encode(
                array('Mensagem' => 'Dados Incompletos. Não foi possivel Deletar a Pizza.')
            );
        }
    }
    catch (Exception $e)
    {
        echo json_encode(array("erro" => $e->getMessage()));
    }
}
else
{
    http_response_code(405);
    echo json_encode(array("erro" => "Método não permitido!"));
}