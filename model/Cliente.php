<?php
    class Cliente{
        private $id;
        private $nome;
        private $cpf;
        private $tipo = 1;

        public function getNome(){
            return $this->nome;
        }

        public function getCpf(){
            return $this->cpf;
        }

        public function getId(){
            return $this->id;
        }

        public function getTipo(){
            return $this->tipo;
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function setCpf($cpf){
            $this->cpf = $cpf;
        }

        public function setIdCliente($id){
            $this->id = $id;
        }
    }
?>