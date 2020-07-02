<?php
include __DIR__ . '/../control/UsuarioControl.php';

header('Content-type: application/json');

$data = file_get_contents('php://input');
$obj =  json_decode($data);

if (!empty($data)) {
	try {
		$usuario = new UsuarioControl();
		$resposta = $usuario->insert($obj);
		http_response_code(200);
		$obj->id = $resposta;
		echo json_encode($obj);
	} catch (PDOException $e) {
		http_response_code(400);
		echo json_encode(array("mensagem" => $e));
	}
} else {
	http_response_code(400);
	echo json_encode(array("mensagem" => "Não foram enviados parâmetros"));
}
