<?php

namespace core\controladores;

use core\classes\Store;

class Main {
    
    // ============================================================
    public function index(){

      $dados = [
        'titulo' => APP_NAME, '' , APP_VERSION,
      ];

      Store::layout([
        'layouts/html_header',
        'layout/header.php',
        'pagina_inicial',
        'layout/footer',
        'layouts/html_footer',
      ], $dados); 
    }

    // ============================================================
    public function loja(){
        echo 'LOJA!!!!!!';
    }
    
}