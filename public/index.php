<?php

use core\classes\Database;
use core\classes\Functions;

//abrir sessão 
session_start();

//carregar o config
require_once('../config.php');

// carrega todas as classes do projeto
require_once('../vendor/autoload.php');

$bd = new Database();
$clientes = $bd->select("SELECT * FROM clientes");
echo '<pre>';
print_r($clientes);