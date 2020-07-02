<?php

include __DIR__ . '/Conexao.php';

class Evento extends Conexao
{
    private $id;
    private $nome;
    private $decricao;
    private $data_inicio;
    private $data_final;
    private $hora_inicio;
    private $hora_final;
    private $vagas;
    private $endereco;

    public function getEndereco()
    {
        return $this->endereco;
    }
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }
    public function getHora_final()
    {
        return $this->hora_final;
    }
    public function setHora_final($hora_final)
    {
        $this->hora_final = $hora_final;
    }

    public function getData_final()
    {
        return $this->data_final;
    }
    public function setData_final($data_final)
    {
        $this->data_final = $data_final;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getDescricao()
    {
        return $this->decricao;
    }

    public function setDescricao($decricao)
    {
        $this->decricao = $decricao;
    }

    public function getData_inicio()
    {
        return $this->data_inicio;
    }

    public function setData_inicio($data_inicio)
    {
        $this->data_inicio = $data_inicio;
    }

    public function getHora_inicio()
    {
        return $this->hora_inicio;
    }

    public function setHora_inicio($hora_inicio)
    {
        $this->hora_inicio = $hora_inicio;
    }

    public function getVagas()
    {
        return $this->vagas;
    }

    public function setVagas($vagas)
    {
        $this->vagas = $vagas;
    }

    public function insert($obj)
    {
        $sql = "INSERT INTO evento(nome,decricao,data_inicio,data_final,hora_inicio,hora_final,vagas,endereco) VALUES (:nome,:decricao,:data_inicio,:data_final,:hora_inicio,:hora_final,:vagas,:endereco)";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('nome',  $obj->nome);
        $consulta->bindValue('decricao', $obj->decricao);
        $consulta->bindValue('data_inicio', $obj->data_inicio);
        $consulta->bindValue('data_final', $obj->data_final);
        $consulta->bindValue('hora_inicio', $obj->hora_inicio);
        $consulta->bindValue('hora_final', $obj->hora_final);
        $consulta->bindValue('vagas', $obj->vagas);
        $consulta->bindValue('endereco', $obj->endereco);
        $consulta->execute();
        return Conexao::lastId(); /*Aqui vc tem o ID da pessoa, você pode não retornar ele e adicionar uma nova query para inserção e inserir nas duas tabelas ao mesmo tempo se for sempre assim */
    }

    public function update($obj, $id = null)
    {
        $sql = "UPDATE evento SET 
            nome = :nome, 
            decricao = :decricao,
            data_inicio = :data_inicio, 
            data_final = :data_final,
            hora_inicio =:hora_inicio, 
            hora_final=:hora_final,
            vagas=:vagas,
            endereco=:endereco
        WHERE id = :id ";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('nome', $obj->nome);
        $consulta->bindValue('decricao', $obj->decricao);
        $consulta->bindValue('data_inicio', $obj->data_inicio);
        $consulta->bindValue('data_final', $obj->data_final);
        $consulta->bindValue('hora_inicio', $obj->hora_inicio);
        $consulta->bindValue('hora_final', $obj->hora_final);
        $consulta->bindValue('vagas', $obj->vagas);
        $consulta->bindValue('ndereco', $obj->endereco);
        $consulta->bindValue('id', $id);
        return $consulta->execute();
    }

    public function delete($obj, $id = null)
    {
        $sql =  "DELETE FROM evento WHERE id = :id";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id', $id);
        $consulta->execute();
        return $consulta->execute();
    }

    public function find($id = null)
    {
        $sql =  "SELECT * FROM evento WHERE id = :id";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id', $id);
        $consulta->execute();
        return $consulta->fetch();
    }

    public function findAll()
    {
        $sql = "SELECT * FROM evento";
        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll();
    }
}
