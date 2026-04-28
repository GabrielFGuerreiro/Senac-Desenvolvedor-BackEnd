<?php
//De onde vem a requisição. * é público
header("Access-Control-Allow-Origin: *");

//Definir o tipo de conteúdo como JSON
header("Content-Type: application/json; charset=UTF-8");

//Quais os verbos HTTP são permitidos
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

//Codificar para JSON
echo json_encode(["Mensagem" => "Hello! Bem vindos à Juca Pizzas!"]);
