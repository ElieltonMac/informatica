<?php
    require_once("conexaoDao.php");

    class Atendente {
        private $conexaoDao;

        public function __construct(){
            $this->conexaoDao = new ConexaoDao();
        }

        public function cadastrarAtendente(Atendente $atendente){
            $nome = $atendente->getNome();
            $cpf = $atendente->getCpf();
            $tipo = $atendente->getTipo();
            
            try{
                $conexao = $this->conexaoDao->conecta();
                $sql = "INSERT INTO atendente(nome_atendente, cpf, tipo_user) VALUES (:nome_atendente, :cpf, :tipo_user)";
                $stmt = $conexao->prepare($sql);
                $stmt->bindParam(":nome_atendente", $nome);
                $stmt->bindParam(":cpf", $cpf);
                $stmt->bindParam(":tipo_user", $tipo);
                $result = $stmt->execute();

                if($result){
                    return 1;
                }else{
                    return -1;
                }
            }catch(PDOException $ex){
                echo "Erro: ". $ex->getMessage();
            }
        }
    }
?>