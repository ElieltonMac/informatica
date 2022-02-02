<?php
    require_once("Cliente.php");
    require_once("Atendente.php");
    require_once("Tecnico.php");
    class Solicitacao{
        private $id;
        private $dataSolicitacao;
        private $status;
        private $cliente;
        private $atendente;
        private $tecnico;
        private $telefone;
        private $whatsapp;
        private $equipamento;
        private $marca;
        private $modelo;
        private $problemaInfo;
        private $problemaConst;
        private $observacoes;


        public function __construct(){
            $this->cliente = new Cliente();
            $this->atendente = new Atendente();
            $this->tecnico = new Tecnico();
        }

        public function getId(){
            return $this->id;
        }

        public function getDataSolicitacao(){
            return $this->dataSolicitacao;
        }

        public function getStatus(){
            return $this->status;
        }

        public function getTelefone(){
            return $this->telefone;
        }

        public function getWhatsapp(){
            return $this->whatsapp;
        }

        public function getEquipamento(){
            return $this->equipamento;
        }

        public function getMarca(){
            return $this->marca;
        }

        public function getModelo(){
            return $this->modelo;
        }

        public function getProblemaInfo(){
            return $this->problemaInfo;
        }

        public function getProblemaConst(){
            return $this->problemaConst;
        }

        public function getObservacoes(){
            return $this->observacoes;
        }

        public function getAtendente(){
            return $this->atendente->getId();
        }

        public function getCliente(){
            return $this->cliente->getId();
        }

        public function getTecnico(){
            return $this->tecnico->getId();
        }

        public function setId($id){
            $this->id = $id;
        }

        public function setDataSolicitacao($dataSolicitacao){
            $this->dataSolicitacao = $dataSolicitacao;
        }

        public function setStatus($status){
            $this->status = $status;
        }

        public function setTelefone($telefone){
            $this->telefone = $telefone;
        }

        public function setWhatsapp($whatsapp){
            $this->whatsapp = $whatsapp;
        }

        public function setEquipamento($equipamento){
            $this->equipamento = $equipamento;
        }

        public function setMarca($marca){
            $this->marca = $marca;
        }

        public function setModelo($modelo){
            $this->modelo = $modelo;
        }

        public function setProblemaInfo($problemaInfo){
            $this->problemaInfo = $problemaInfo;
        }

        public function setProblemaConst($problemaConst){
            $this->problemaConst = $problemaConst;
        }

        public function setObservacoes($observacoes){
            $this->observacoes = $observacoes;
        }

        public function setCliente($id){
            $this->cliente->setId($id);
        }

        public function setAtendente($id){
            $this->atendente->setId($id);
        }

        public function setTecnico(){
            $this->tecnico->setId(1);
        }

    }
?>