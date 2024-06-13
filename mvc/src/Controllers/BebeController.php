<?php

namespace php\projeto\Controllers;

use php\projeto\Models\DAO\BebeDAO;
use php\projeto\Models\Domain\Bebe;

class BebeController {
    /*public function store(){
        $bebe = new Bebe(0,$_POST["nome"],(float)$_POST["peso"],(int)$_POST["sexo"]);
        $bebeDAO = new BebeDAO();

        if (!$bebeDAO->create($bebe)) {
            echo "Erro ao inserir";
        }

        require_once("../src/Views/bebe/index.html");
    }*/

    public function index(){
        $bebeDAO = new BebeDAO();
        $listBebe = $bebeDAO->query();

        require_once("../src/Views/bebe/index.php");
    }

    public function create() {
        require_once("../src/Views/bebe/criar.html");
    }

    public function store(){
        $bebe = new Bebe(0,$_POST["nome"],$_POST["peso"],$_POST["sexo"]);
        $bebeDAO = new BebeDAO();

        if (!$bebeDAO->create($bebe)) {
            echo "Erro ao inserir";
        }

        header("location: /bebe");
    }

    public function edit(array $params) {
        $id = (int)$params[1];
        $bebeDAO = new BebeDAO();
        $bebe = $bebeDAO->queryID($id);

        require_once("../src/Views/bebe/editar.php");
    }

    public function update(array $params) {
        $id = (int)$params[1];
        $bebe = new Bebe($id,$_POST["nome"],$_POST["peso"],$_POST["sexo"]);
        $bebeDAO = new BebeDAO();

        if (!$bebeDAO->update($bebe)) {
            echo "Erro ao alterar";
        }

        header("location: /bebe");
    }

    public function destroy(array $params) {
        $id = (int)$params[1];
        $bebeDAO = new BebeDAO();

        if (!$bebeDAO->delete($id)) {
            echo "Erro ao deletar";
        }

        header("location: /bebe");
    }
}