<?php

namespace php\projeto\Controllers;

use php\projeto\Models\DAO\MedicoDAO;
use php\projeto\Models\Domain\Medico;

class MedicoController {
    public function index(){
        $medicoDAO = new MedicoDAO();
        $listMedico = $medicoDAO->query();

        require_once("../src/Views/medico/index.php");
    }

    public function create() {
        require_once("../src/Views/medico/criar.html");
    }

    public function store(){
        $medico = new Medico(0,$_POST["nome"],(int)$_POST["crm"],$_POST["numero"]);
        $medicoDAO = new MedicoDAO();

        if (!$medicoDAO->create($medico)) {
            echo "Erro ao inserir";
        }

        header("location: /medico");
    }

    public function edit(array $params) {
        $id = (int)$params[1];
        $medicoDAO = new MedicoDAO();
        $medico = $medicoDAO->queryID($id);

        require_once("../src/Views/medico/editar.php");
    }

    public function update(array $params) {
        $id = (int)$params[1];
        $medico = new Medico($id,$_POST["nome"],(int)$_POST["crm"],$_POST["numero"]);
        $medicoDAO = new MedicoDAO();

        if (!$medicoDAO->update($medico)) {
            echo "Erro ao alterar";
        }

        header("location: /medico");
    }

    public function destroy(array $params) {
        $id = (int)$params[1];
        $medicoDAO = new MedicoDAO();

        if (!$medicoDAO->delete($id)) {
            echo "Erro ao deletar";
        }

        header("location: /medico");
    }
}