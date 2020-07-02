<?php

include __DIR__ . '/Conexao.php';

class Usuario extends Conexao
{
    private $id;
    private $nome;
    private $telefone;
    private $email;
    private $data_nascimento;
    private $senha;


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

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getData_Nasc()
    {
        return $this->data_nascimento;
    }

    public function setData_Nasc($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function insert($obj)
    {
        $sql = "INSERT INTO usuario(nome,telefone,email,data_nascimento,senha) VALUES (:nome,:telefone,:email,:data_nascimento,:senha)";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('nome',  $obj->nome);
        $consulta->bindValue('telefone', $obj->telefone);
        $consulta->bindValue('email', $obj->email);
        $consulta->bindValue('data_nascimento', $obj->data_nascimento);
        $consulta->bindValue('senha', $obj->senha);
        $consulta->execute();
        return Conexao::lastId(); /*Aqui vc tem o ID da pessoa, você pode não retornar ele e adicionar uma nova query para inserção e inserir nas duas tabelas ao mesmo tempo se for sempre assim */
    }

    public function update($obj, $id = null)
    {
        $sql = "UPDATE usuario SET 
            nome = :nome, 
            telefone = :telefone,
            email = :email, 
            data_nascimento = :data_nascimento,
            senha =:senha 
        WHERE id = :id ";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('nome', $obj->nome);
        $consulta->bindValue('senha', $obj->senha);
        $consulta->bindValue('email', $obj->email);
        $consulta->bindValue('telefone', $obj->telefone);
        $consulta->bindValue('data_nascimento', $obj->data_nascimento);
        $consulta->bindValue('id', $id);
        return $consulta->execute();
    }

    public function delete($obj, $id = null)
    {
        $sql =  "DELETE FROM usuario WHERE id = :id";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id', $id);
        $consulta->execute();
        return $consulta->execute();
    }

    public function find($id = null)
    {
        $sql =  "SELECT * FROM usuario WHERE id = :id";
        $consulta = Conexao::prepare($sql);
        $consulta->bindValue('id', $id);
        $consulta->execute();
        return $consulta->fetch();
    }

    public function findAll()
    {
        $sql = "SELECT * FROM usuario";
        $consulta = Conexao::prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll();
    }
}
