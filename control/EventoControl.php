<?php
include __DIR__ . '/../model/Evento.php';
class EventoControl
{
    function insert($obj)
    {
        $Evento = new Evento();
        /* CHANCE DE MANIPULAR A REQUISIÇÃO ANTES DE ACESSAR O MODEL */
        return $Evento->insert($obj);
    }

    function update($obj, $id)
    {
        $Evento = new Evento();
        return $Evento->update($obj, $id);
    }

    function delete($obj, $id)
    {
        $Evento = new Evento();
        return $Evento->delete($obj, $id);
    }

    function find($id = null)
    {
        $Evento = new Evento();
        return $Evento->find($id);
    }

    function findAll()
    {
        $Evento = new Evento();
        return $Evento->findAll();
    }
}
