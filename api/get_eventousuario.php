<?php
include __DIR__ . '/../control/EventoUsuarioControl.php';
$evento_usuariocontrol = new EventoUsuarioControl();

header('Content-type: application/json');

if (!isset($args[1])) {
    $result = $evento_usuariocontrol->find();
    if ($result) {
        http_response_code(200);
        echo json_encode($result);
    } else {
        http_response_code(400);
        echo json_encode(array("mensagem" => "Não encontrado"));
    }
} else {
    $result = $evento_usuariocontrol->find($args[1]);
    if ($result) {
        http_response_code(200);
        echo json_encode($result);
    } else {
        http_response_code(400);
        echo json_encode(array("mensagem" => "Não encontrado"));
    }
}
