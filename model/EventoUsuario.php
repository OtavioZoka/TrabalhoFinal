<?php

include __DIR__ . '/Conexao.php';

class EventoUsuario extends Conexao
{
    private $id_usuario;
    private $id_evento;

    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function setId_Usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getId_evento()
    {
        return $this->id_evento;
    }
    public function setId_evento($id_evento)
    {
        $this->id_evento = $id_evento;
        return $this;
    }



    public function insert($obj)
    {
        $sql = "INSERT INTO evento_usuario(id_evento,id_usuario) VALUES (:id_evento,:id_usuario)";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id_evento',  $obj->id_evento);
        $consulta->bindValue('id_usuario', $obj->id_usuario);
        return $consulta->execute();
    }


    public function find()
    {
        $sql =  "SELECT * FROM evento_usuario ";
        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll();
    }
}
