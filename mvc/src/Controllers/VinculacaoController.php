<?php

namespace php\projeto\Controllers;

use php\projeto\Models\DAO\VinculacaoDAO;
use php\projeto\Models\DAO\MaeDAO;
use php\projeto\Models\DAO\BebeDAO;
use php\projeto\Models\DAO\MedicoDAO;
use php\projeto\Models\Domain\Vinculacao;

class VinculacaoController {
    public function index(){
        $vinculacaoDAO = new VinculacaoDAO();
        $listVinculacao = $vinculacaoDAO->query();

        require_once("../src/Views/vinculacao/index.php");
    }

    public function create() {
        $maeDAO = new MaeDAO();
        $bebeDAO = new BebeDAO();
        $medicoDAO = new MedicoDAO();

        $listMae = $maeDAO->query();
        $listBebe = $bebeDAO->query();
        $listMedico = $medicoDAO->query();

        require_once("../src/Views/vinculacao/criar.php");
    }

    public function store() {
        $vinculacao = new Vinculacao(0,(int)$_POST["mae"],(int)$_POST["medico"],(int)$_POST["bebe"]);
        $vinculacaoDAO = new VinculacaoDAO();

        if (!$vinculacaoDAO->create($vinculacao)) {
            return "Erro ao inserir";
        }

        header("location: /vinculacao");
    }

    public function edit(array $params) {
        $id = (int)$params[1];
        $maeDAO = new MaeDAO();
        $bebeDAO = new BebeDAO();
        $medicoDAO = new MedicoDAO();
        $vinculacaoDAO = new VinculacaoDAO();

        $listMae = $maeDAO->query();
        $listBebe = $bebeDAO->query();
        $listMedico = $medicoDAO->query();
        $vinculacao = $vinculacaoDAO->queryID($id);

        require_once("../src/Views/vinculacao/editar.php");
    }

    public function update(array $params) {
        $id = (int)$params[1];
        $vinculacao = new Vinculacao($id,(int)$_POST["mae"],(int)$_POST["medico"],(int)$_POST["bebe"]);
        $vinculacaoDAO = new VinculacaoDAO();

        if (!$vinculacaoDAO->update($vinculacao)) {
            return "Erro ao alterar";
        }

        header("location: /vinculacao");
    }

    public function destroy(array $params) {
        $id = (int)$params[1];
        $vinculacaoDAO = new VinculacaoDAO();

        if (!$vinculacaoDAO->delete($id)) {
            echo "Erro ao deletar";
        }

        header("location: /vinculacao");
    }
}