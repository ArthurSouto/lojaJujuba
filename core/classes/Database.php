<?php

namespace core\classes;

use Exception;
use PDO;
use PDOException;

class Database{

    private $ligacao;

    // ============================================================
    private function ligar(){
        // ligar base de dados
        $this->ligacao = new PDO(
            'mysql:'.
            'host='.MYSQL_SERVER.';'.
            'dbname='.MYSQL_DATABASE.';'.
            'charset='.MYSQL_CHARSET,
            MYSQL_USER,
            MYSQL_PASS,
            array(PDO::ATTR_PERSISTENT => true)
        );

        //debug
        $this->ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    // ============================================================
    private function desligar(){
        // desligar a base de dados
        $this->ligacao = null;
    }
    
    // ============================================================
    //CRUD
    // ============================================================
    public function select($sql, $parametros = null){
        
        //verifica se é uma instrução SELECT
        if(!preg_match("/^SELECT/i", $sql)){
            throw new Exception('Base de Dados - Não é uma intrução SELECT.');
        }

        //liga
        $this->ligar();

        $resultados = null;

        //comunicar
        try {
            // comunicação com a BD
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
                $resultados = $executar->fetchall(PDO::FETCH_CLASS);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
                $resultados = $executar->fetchall(PDO::FETCH_CLASS);
            }

        } catch (PDOException $e) {
            // caso exista erro
            return false;
        }

        // desliga da BD
        $this->desligar();

        //devolder resultado obtidos
        return $resultados;
    }

    // ============================================================
    public function insert($sql, $parametros = null){
        
        //verifica se é uma instrução INSERT
        if(!preg_match("/^INSERTT/i", $sql)){
            throw new Exception('Base de Dados - Não é uma intrução INSERT.');
        }

        // liga
        $this->ligar();

        $resultados = null;

        //comunicar
        try {
            // comunicação com a BD
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }

        } catch (PDOException $e) {
            // caso exista erro
            return false;
        }

        // desligar da BD
        $this->desligar();
    }

    // ============================================================
    public function update($sql, $parametros = null){
        
        //verifica se é uma instrução INSERT
        if(!preg_match("/^UPDATE/i", $sql)){
            throw new Exception('Base de Dados - Não é uma intrução UPDATE.');
        }

        // liga
        $this->ligar();

        $resultados = null;

        //comunicar
        try {
            // comunicação com a BD
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }

        } catch (PDOException $e) {
            // caso exista erro
            return false;
        }

        // desligar da BD
        $this->desligar();
    }

    // ============================================================
    public function delete($sql, $parametros = null){
        
        //verifica se é uma instrução INSERT
        if(!preg_match("/^DELETE/i", $sql)){
            throw new Exception('Base de Dados - Não é uma intrução DELETE.');
        }

        // liga
        $this->ligar();

        $resultados = null;

        //comunicar
        try {
            // comunicação com a BD
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }

        } catch (PDOException $e) {
            // caso exista erro
            return false;
        }

        // desligar da BD
        $this->desligar();
    }


    // ============================================================
    //GENÉRICA
    // ============================================================
    public function statement($sql, $parametros = null){
        
        //verifica se é uma instrução diferente das anteriores
        if(preg_match("/^(SELECT|INSERT|UPDATE|DELETE)/i", $sql)){
            throw new Exception('Base de Dados - instrução invalida.');
        }

        // liga
        $this->ligar();

        $resultados = null;

        //comunicar
        try {
            // comunicação com a BD
            if(!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
            } else {
                $executar = $this->ligacao->prepare($sql);
                $executar->execute();
            }

        } catch (PDOException $e) {
            // caso exista erro
            return false;
        }

        // desligar da BD
        $this->desligar();
    }
}