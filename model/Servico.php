<?php
    require_once("Item.php");
    class Servico extends Item{
        private $tempo_prazo;

        public function __construct($descricao, $valor, $tempo_prazo){
            $this->descricao = $descricao;
            $this->valor = $valor;
            $this->tempo_prazo = $tempo_prazo;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function getValor(){
            return $this->valor;
        }

        public function getPrazo(){
            return $this->tempo_prazo;
        }

        public function setDescricao($descricao){
            $this->descricao = $descricao;
        }

        public function setValor($valor){
            $this->valor = $valor;
        }

        public function setPrazo($tempo_prazo){
            $this->tempo_prazo = $tempo_prazo;
        }
    }
?>