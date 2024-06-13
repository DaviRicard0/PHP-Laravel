<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

$r = new php\projeto\Router($metodo, $caminho);

#ROTAS

$r->get('/','php\projeto\Controllers\HomeController@index');

// Get Médico
$r->get('/medico','php\projeto\Controllers\MedicoController@index');
$r->get('/medico/criar','php\projeto\Controllers\MedicoController@create');
$r->get('/medico/editar/{id}','php\projeto\Controllers\MedicoController@edit');
// Post Médico
$r->post('/medico/criar','php\projeto\Controllers\MedicoController@store');
$r->post('/medico/editar/{id}','php\projeto\Controllers\MedicoController@update');
$r->post('/medico/deletar/{id}','php\projeto\Controllers\MedicoController@destroy');

// Get Mãe
$r->get('/mae','php\projeto\Controllers\MaeController@index');
$r->get('/mae/criar','php\projeto\Controllers\MaeController@create');
$r->get('/mae/editar/{id}','php\projeto\Controllers\MaeController@edit');
// Post Médico
$r->post('/mae/criar','php\projeto\Controllers\MaeController@store');
$r->post('/mae/editar/{id}','php\projeto\Controllers\MaeController@update');
$r->post('/mae/deletar/{id}','php\projeto\Controllers\MaeController@destroy');

// Get Bebe
$r->get('/bebe','php\projeto\Controllers\BebeController@index');
$r->get('/bebe/criar','php\projeto\Controllers\BebeController@create');
$r->get('/bebe/editar/{id}','php\projeto\Controllers\BebeController@edit');
// Post Médico
$r->post('/bebe/criar','php\projeto\Controllers\BebeController@store');
$r->post('/bebe/editar/{id}','php\projeto\Controllers\BebeController@update');
$r->post('/bebe/deletar/{id}','php\projeto\Controllers\BebeController@destroy');

// Get Vinculação
$r->get('/vinculacao','php\projeto\Controllers\VinculacaoController@index');
$r->get('/vinculacao/criar','php\projeto\Controllers\VinculacaoController@create');
$r->get('/vinculacao/editar/{id}','php\projeto\Controllers\VinculacaoController@edit');
// Post Vinculação
$r->post('/vinculacao/criar','php\projeto\Controllers\VinculacaoController@store');
$r->post('/vinculacao/editar/{id}','php\projeto\Controllers\VinculacaoController@update');
$r->post('/vinculacao/deletar/{id}','php\projeto\Controllers\VinculacaoController@destroy');

#ROTAS

$resultado = $r->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

if ($resultado instanceof Closure) {
    echo $resultado($r->getParams());
}elseif(is_string($resultado)){
    $resultado = explode('@',$resultado);
    $controller = new $resultado[0];
    $action = $resultado[1];

    echo $controller->$action($r->getParams());
}