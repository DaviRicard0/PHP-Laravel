<?php

namespace php\projeto\Models\DAO;

use Exception;
use PDO;
use php\projeto\Models\Domain\Mae;

class MaeDAO{
    private DAO $dao;

    public function __construct() {
        $this->dao = new DAO();
    }

    public function create(Mae $mae){
        try {
            $sql = "
                INSERT INTO mae 
                (
                    nome,
                    idade,
                    numero
                ) 
                VALUES (
                    :nome,
                    :idade,
                    :numero
                )
            ";
            $p = $this->dao->getConexao()->prepare($sql);
            $p->bindValue(":nome",$mae->getNome());
            $p->bindValue(":idade",$mae->getIdade());
            $p->bindValue(":numero",$mae->getNumero());
            return $p->execute();
        } catch (Exception $e) {
            return 0;
        }
    }

    public function delete($id){
        try {
            $sql = "DELETE FROM mae WHERE id = :id";
            $p = $this->dao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch (Exception $e) {
            return 0;
        }
    }

    public function update(Mae $mae){
        try {
            $sql = "
                UPDATE mae 
                SET 
                    nome = :nome,
                    idade = :idade,
                    numero = :numero
                WHERE 
                    id = :id
            ";
            $p = $this->dao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $mae->getNome());
            $p->bindValue(":idade", $mae->getIdade());
            $p->bindValue(":numero", $mae->getNumero());
            $p->bindValue(":id", $mae->getId());
            return $p->execute();
        } catch (Exception $e) {
            return 0;
        }
    }    

    public function query(){
        $sql = "SELECT * FROM mae";
        $stm = $this->dao->getConexao()->query($sql);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function queryId(int $id){
        $sql = "SELECT * FROM mae WHERE id = $id";
        $stm = $this->dao->getConexao()->query($sql);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
}