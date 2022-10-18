<?php

namespace core\controladores;

use core\classes\Functions;

class Main {
    
    // ============================================================
    public function index(){
        
        $clientes = ['João', 'Ana', 'Carlos'];

        Functions::layout([
            'layouts/html_header',
            'pagina_inicial',
            'layouts/html_footer',
        ]);

    }

    // ============================================================
    public function loja(){
        echo 'LOJA!!!!!!';
    }
    
}