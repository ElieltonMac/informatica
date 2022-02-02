<?php
    require_once("Pessoa.php");

    class Cliente extends Pessoa{
        private $tipo = 1;

        public function getTipo(){
            return $this->tipo;
        }
    }
?>