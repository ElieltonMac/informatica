<?php
    class Usuario {
        private $nome_usuario;
        private $senha;
        
        public function getUser(){
            return $this->nome_usuario;
        }

        public function getSenha(){
            return $this->senha;
        }

        public function setUser($nome_usuario){
            $this->nome_usuario = $nome_usuario;
        }

        public function setSenha($senha){
            $this->senha = $senha;
        }
    }
?>