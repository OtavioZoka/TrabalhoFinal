<?php

include __DIR__ . '/../model/EventoUsuario.php';
class EventoUsuarioControl

{

    function insert($obj)
    {
        $Evento_Usuario = new EventoUsuario();
        /* CHANCE DE MANIPULAR A REQUISIÇÃO ANTES DE ACESSAR O MODEL */
        return $Evento_Usuario->insert($obj);
    }


    function find()
    {
        $Evento_Usuario = new EventoUsuario();
        return $Evento_Usuario->find();
    }
}
