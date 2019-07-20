<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of bdConexao
 *
 * @author anderson
 */
class bdConexao {

    //put your code here
    // /*===== Host =====*/
//     private $user = 'epiz_23000167';
//     private $pass = 'jakDB1cO';
//     private $host = "sql311.epizy.com";
//     private $banco = "epiz_23000167_test";

     /*===== Sandbox =====*/   
      private $user = "root";
      private $pass = "";
      private $host = "localhost";
      private $banco = "ecommerce";


    private function conectar() {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->banco", $this->user, $this->pass);
        return $conn;
    }

    public function executar($sql) {
        $e = $this->conectar()->prepare($sql);
        return $e->execute();
    }

    public function listar($sql) {
        $e = $this->conectar()->prepare($sql);
        $e->execute();
        return $e->fetchAll(PDO::FETCH_ASSOC);
    }

}
