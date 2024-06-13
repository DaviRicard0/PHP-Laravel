<?php

namespace php\projeto\Controllers;

use php\projeto\Models\DAO\MaeDAO;
use php\projeto\Models\Domain\Mae;

class MaeController {
    public function index(){
        $maeDAO = new MaeDAO();
        $listMae = $maeDAO->query();

        require_once("../src/Views/mae/index.php");
    }

    public function create() {
        require_once("../src/Views/mae/criar.html");
    }

    public function store(){
        $mae = new Mae(0,$_POST["nome"],(int)$_POST["idade"],$_POST["numero"]);
        $maeDAO = new MaeDAO();

        if (!$maeDAO->create($mae)) {
            echo "Erro ao inserir";
        }

        header("location: /mae");
    }

    public function edit(array $params) {
        $id = (int)$params[1];
        $maeDAO = new MaeDAO();
        $mae = $maeDAO->queryID($id);

        require_once("../src/Views/mae/editar.php");
    }

    public function update(array $params) {
        $id = (int)$params[1];
        $mae = new Mae($id,$_POST["nome"],(int)$_POST["idade"],$_POST["numero"]);
        $maeDAO = new MaeDAO();

        if (!$maeDAO->update($mae)) {
            echo "Erro ao alterar";
        }

        header("location: /mae");
    }

    public function destroy(array $params) {
        $id = (int)$params[1];
        $maeDAO = new MaeDAO();

        if (!$maeDAO->delete($id)) {
            echo "Erro ao deletar";
        }

        header("location: /mae");
    }
}