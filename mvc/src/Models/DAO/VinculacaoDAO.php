<?php

namespace php\projeto\Models\DAO;

use Exception;
use PDO;
use php\projeto\Models\Domain\Vinculacao;

class VinculacaoDAO{
    private DAO $dao;

    public function __construct() {
        $this->dao = new DAO();
    }

    public function create(Vinculacao $vinculacao){
        try {
            $sql = "
                INSERT INTO vinculacao 
                (
                    medico_id,
                    mae_id,
                    bebe_id
                ) 
                VALUES (
                    :medico_id,
                    :mae_id,
                    :bebe_id
                )
            ";
            $p = $this->dao->getConexao()->prepare($sql);
            $p->bindValue(":medico_id",$vinculacao->getMedico());
            $p->bindValue(":mae_id",$vinculacao->getMae());
            $p->bindValue(":bebe_id",$vinculacao->getBebe());
            return $p->execute();
        } catch (Exception $e) {
            return 0;
        }
    }

    public function update(Vinculacao $vinculacao){
        try {
            $sql = "
                UPDATE vinculacao 
                SET
                    medico_id = :medico_id,
                    mae_id = :mae_id,
                    bebe_id = :bebe_id
                WHERE id = :id
            ";
            $p = $this->dao->getConexao()->prepare($sql);
            $p->bindValue(":medico_id", $vinculacao->getMedico());
            $p->bindValue(":mae_id", $vinculacao->getMae());
            $p->bindValue(":bebe_id", $vinculacao->getBebe());
            $p->bindValue(":id", $vinculacao->getId());
            return $p->execute();
        } catch (Exception $e) {
            return 0;
        }
    }
    
    public function delete($id){
        try {
            $sql = "DELETE FROM vinculacao WHERE id = :id";
            $p = $this->dao->getConexao()->prepare($sql);
            $p->bindValue(":id", $id);
            return $p->execute();
        } catch (Exception $e) {
            return 0;
        }
    }

    public function query(){
        $sql = "
            SELECT vi.id,ma.nome as mae, be.nome as bebe, me.nome as medico/*GROUP_CONCAT('Bebê: ',be.nome,', Médico: ',me.nome SEPARATOR '<br>') as bebe_medico*/ 
            FROM vinculacao as vi
            INNER JOIN bebe as be ON be.id = vi.bebe_id
            INNER JOIN mae as ma ON ma.id = vi.mae_id
            INNER JOIN medico AS me ON me.id = vi.medico_id
            -- GROUP BY ma.id
        ";
        $stm = $this->dao->getConexao()->query($sql);
        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function queryId(int $id){
        $sql = "SELECT * FROM vinculacao WHERE id = $id";
        $stm = $this->dao->getConexao()->query($sql);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }
}