<?php
    require_once("Item.php");
    class Material extends Item{
        public function __construct($descricao, $valor){
            $this->descricao = $descricao;
            $this->valor = $valor;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function getValor(){
            return $this->valor;
        }

        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }

        public function setValor($valor){
            $this->valor = $valor;
        }
    }
?>