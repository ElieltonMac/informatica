<?php
    class ConexaoDao{
        private $server = "localhost";
        private $user = "root";
        private $pass = "";
        private $db = "bd_informatica";

        public function conecta(){
            $conexao = new PDO("mysql:server={$this->server}; dbname={$this->db}; charset=utf8", $this->user, $this->pass);
            return $conexao;
        }
    }
?>