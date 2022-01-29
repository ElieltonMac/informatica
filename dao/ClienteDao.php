<?php
    require_once("conexaoDao.php");
    class ClienteDao{
        private $conexaoDao;

        public function __construct(){
            $this->conexaoDao = new ConexaoDao();
        }

        public function cadastrarCliente(Cliente $cliente){
            $nome = $cliente->getNome();
            $cpf_cnpj = $cliente->getCpf();
            $tipo = $cliente->getTipo();
            
            try{
                $conexao = $this->conexaoDao->conecta();
                $sql = "INSERT INTO cliente(nome_cliente, cpf_cnpj, tipo_user) VALUES (:nome_cliente, :cpf_cnpj, :tipo_user)";
                $stmt = $conexao->prepare($sql);
                $stmt->bindParam(":nome_cliente", $nome);
                $stmt->bindParam(":cpf_cnpj", $cpf_cnpj);
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

        public function todosClientes(){
            try{
                $conexao = $this->conexaoDao->conecta();
                $sql = "SELECT * FROM cliente";
                $stmt = $conexao->prepare($sql);
                $result = $stmt->execute();
                $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if($result){
                    return $clientes;
                }else{
                    return -1;
                }
            }catch(PDOException $ex){
                echo "Erro: ". $ex->getMessage();
            }
        }

        public function alteraCliente(Cliente $cliente){
            $id = $cliente->getId();
            $nome = $cliente->getNome();
            $cpf_cnpj = $cliente->getCpf();

            try{
                $conexao = $this->conexaoDao->conecta();
                $sql = "UPDATE cliente SET nome_cliente = :nome_cliente, cpf_cnpj = :cpf_cnpj WHERE id_cliente = :id_cliente";
                $stmt = $conexao->prepare($sql);
                $stmt->bindParam(":nome_cliente", $nome);
                $stmt->bindParam(":cpf_cnpj", $cpf_cnpj);
                $stmt->bindParam(":id_cliente", $id);
                $result = $stmt->execute();

                if($result){
                    return 1;
                }else{
                    return -1;
                }
            }catch(PDOException $ex){

            }
        }

        public function retornaCliente($id){
            try{
                $conexao = $this->conexaoDao->conecta();
                $sql = "SELECT * FROM cliente WHERE id_cliente = :id_cliente";
                $stmt = $conexao->prepare($sql);
                $stmt->bindParam(":id_cliente", $id);
                $result = $stmt->execute();
                $cliente = $stmt->fetch();

                if($result){
                    return $cliente;
                }else{
                    return -1;
                }
            }catch(PDOException $ex){
                echo "Erro: ". $ex->getMessage();
            }
        }
    }
?>