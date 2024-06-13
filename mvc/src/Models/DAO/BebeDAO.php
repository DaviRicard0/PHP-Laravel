<?php

namespace php\projeto\Models\DAO;

use Exception;
use PDO;
use php\projeto\Models\Domain\Bebe;

class BebeDAO{
    private DAO $dao;

    public function __construct() {
        $this->dao = new DAO();
    }

    public function create(Bebe $bebe){
        try {
            $sql = "
                INSERT INTO bebe 
                (
                    nome,
                    peso,
                    sexo
                ) 
                VALUES (
                    :nome,
                    :peso,
                    :sexo
                )
            ";
            $p = $this->dao->getConexao()->prepare($sql);
            $p->bindValue(":nome",$bebe->getNome());
            $p->bindValue(":peso",$bebe->getPeso());
            $p->bindValue(":sexo",$bebe->getSexo());
            return $p->execute();
        } catch (Exception $e) {
            return 0;
        }
    }
    
    public function delete($id){
        try {
            $sql = "DELETE FROM bebe WHERE id = :id";
            $p = $this->dao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch (Exception $e) {
            return 0;
        }
    }
    
    public function update(Bebe $bebe){
        try {
            $sql = "
                UPDATE bebe 
                SET 
                    nome = :nome,
                    peso = :peso,
                    sexo = :sexo
                WHERE 
                    id = :id
            ";
            $p = $this->dao->getConexao()->prepare($sql);
            $p->bindValue(":nome", $bebe->getNome());
            $p->bindValue(":peso", $bebe->getPeso());
            $p->bindValue(":sexo", $bebe->getSexo());
            $p->bindValue(":id", $bebe->getId());
            return $p->execute();
        } catch (Exception $e) {
            return 0;
        }
    }    

    public function query(){
        $sql = "SELECT * FROM bebe";
        $stm = $this->dao->getConexao()->query($sql);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function queryId(int $id){
        $sql = "SELECT * FROM bebe WHERE id = $id";
        $stm = $this->dao->getConexao()->query($sql);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
}