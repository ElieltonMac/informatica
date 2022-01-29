<?php
    class Pessoa{
        private $nome;
        private $cpf;

        public function __construct($nome, $cpf){
            $this->nome = $nome;
            $this->cpf = $cpf;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getCpf(){
            return $this->cpf;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function setCpf($cpf){
            $this->cpf = $cpf;
        }
    }
?>