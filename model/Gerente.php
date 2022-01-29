<?php
    require_once("Pessoa.php");
    class Gerente extends Pessoa{
        private $telefone;
        
        public function __construct($nome, $cpf, $telefone){
            $this->nome = $nome;
            $this->cpf = $cpf;
            $this->telefone = $telefone;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getCpf(){
            return $this->cpf;
        }

        public function getTelefone(){
            return $this->telefone;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function setCpf($cpf){
            $this->cpf = $cpf;
        }

        public function setTelefone($telefone){
            $this->telefone = $telefone;
        }
    }
?>