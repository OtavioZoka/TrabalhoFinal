<?php
include __DIR__ . '/../control/UsuarioControl.php';
$usuario = new UsuarioControl();

header('Content-type: application/json');

if (!isset($args[1])) {
    $result = $usuario->findAll();
    if ($result) {
        http_response_code(200);
        echo json_encode($result);
    } else {
        http_response_code(400);
        echo json_encode(array("mensagem" => "Não encontrado"));
    }
} else {
    $result = $usuario->find($args[1]);
    if ($result) {
        http_response_code(200);
        echo json_encode($result);
    } else {
        http_response_code(400);
        echo json_encode(array("mensagem" => "Não encontrado"));
    }
}
