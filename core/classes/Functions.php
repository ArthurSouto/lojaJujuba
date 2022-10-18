<?php

namespace core\classes;

use Exception;

class Functions{

    // ============================================================
    public static function layout($estruturas){

        // verifica se estruturas é um array
        if(!is_array($estruturas)){
            throw new Exception("Coleção de estrutras inválida");
        }

        // variáveis

        // apresentar as views da aplicação
        foreach($estruturas as $estrutura){
            include("../core/views/$estrutura.php");
        }

    }

}

/*

hmtl_header.php
inicio.php
html_footer.php

*/