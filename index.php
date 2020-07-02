<?php

header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Methods: GET, POST,");

//define('PASTAPROJETO', 'AulaBanco');
define('TrabalhoFinal', 'Back-End');

/* Função criada para retornar o tipo de requisição */
function checkRequest()
{
	$method = $_SERVER['REQUEST_METHOD'];
	switch ($method) {
		case 'PUT':
			$answer = "update";
			break;
		case 'POST':
			$answer = "post";
			break;
		case 'GET':
			$answer = "get";
			break;
		case 'DELETE':
			$answer = "delete";
			break;
		default:
			// handle_error($method);  
			break;
	}
	return $answer;
}

$answer = checkRequest();
//echo "Tipo de requisição: " . $answer . "\n";

// localhost/PhpBackEnd/pessoas
// localhost/PhpBackEnd/conteudo 
// localhost/PASTAPROJETO/universidades 

$request = $_SERVER['REQUEST_URI'];

// IDENTIFICA A URI DA REQUISIÇÃO

$args = explode('/', rtrim($request, '/'));
// localhost/PhpBackEnd/pessoas

//$args[0] localhost
// $args[1] PhpBackEnd
// $args[2] pessoas

$endpoint = array_shift($args);
if (array_key_exists(0, $args) && !is_numeric($args[0])) {
	$verb = array_shift($args);
}

if ($args) {
	$request = '/' . TrabalhoFinal . '/' . $args[0];
	// /PhpBackEnd/pessoas
	// /PhpBackEnd/pessoas/1
	// /PhpBackEnd/conteudo
}


switch ($request) {
	case '/' . TrabalhoFinal . '/login';
		require __DIR__ . '/view/tela_Login.html';
		break;
	case '/' . TrabalhoFinal . '/index';
		require __DIR__ . '/view/index.html';
		break;
	case '/' . TrabalhoFinal . '/eventos';
		require __DIR__ . '/view/tela_listarEvento.html';
		break;
	case '/' . TrabalhoFinal . '/usuarios';
		require __DIR__ . '/view/tela_usuarioInicio.html';
		break;
	case '/' . TrabalhoFinal . '/criarUsuario';
		require __DIR__ . '/view/tela_cadastrarUsuario.html';
		break;
	case '/' . TrabalhoFinal . '/criarEvento';
		require __DIR__ . '/view/tela_criarEvento.html';
		break;
	case '/' . TrabalhoFinal . '/perfilUsuario';
		require __DIR__ . '/view/tela_perfilUsuario.html';
		break;
	case '/' . TrabalhoFinal . '/perfilEvento';
		require __DIR__ . '/view/tela_perfilEvento.html';
		break;
	case '/' . TrabalhoFinal . '/editUsuario';
		require __DIR__ . '/view/tela_editUsuario.html';
		break;
	case '/' . TrabalhoFinal . '/editEvento';
		require __DIR__ . '/view/tela_editEvento.html';
		break;
	case '/' . TrabalhoFinal . '/evento':
		require __DIR__ . '/api/' . $answer . '_evento.php';
		break;
	case '/' . TrabalhoFinal . '/usuario':
		require __DIR__ . '/api/' . $answer . '_usuario.php';
		break;
	case '/' . TrabalhoFinal . '/teste':
		require __DIR__ . '/api/' . $answer . '_eventousuario.php';
		break;

	default:
		//require __DIR__ . '/api/404.php';
		break;
}
