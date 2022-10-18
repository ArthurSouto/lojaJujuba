<?php

// conexão ed rotas
$rotas = [
    'inicio' => 'main@index',
    'loja' => 'main@loja',
];

// define ação por defeito
$acao = 'inicio';

// verifica se existe a a ação na query string
if(isset($_GET['a'])){
    
    //verifica se a ação existe nas rotas
    if(!key_exists($_GET['a'], $rotas)){
        $acao = 'inico';    
    }else {
        $acao = $_GET['a'];
    }
}

// trata a definição das rotas
$partes = explode('@',$rotas[$acao]);
$controlador = 'core\\controladores\\'.ucfirst($partes[0]);
$metodo = $partes[1];

$ctr = new $controlador();
$ctr->$metodo();