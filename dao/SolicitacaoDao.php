<?php
    require_once("ConexaoDao.php");

    class SolicitacaoDao{
        private $conexaoDao;
        
        public function __construct(){
            $this->conexaoDao = new ConexaoDao();
        }

        public function nextOs(){
            try{
                $conexao = $this->conexaoDao->conecta();

                $sql = "SELECT id_solicitacao FROM solicitacao ORDER BY id_solicitacao DESC LIMIT 0, 1";
                $stmt = $conexao->prepare($sql);
                $result = $stmt->execute();
                $linha = $stmt->fetch();
                if($linha == 0){
                    return 0;
                }else{
                    return $linha["id_solicitacao"];
                }
            }catch(PDOException $ex){
                echo "Erro: " . $ex->getMessage();
            }
        }

        public function retornaClientes(){
            try{
                $conexao = $this->conexaoDao->conecta();
                $sql = "SELECT id_cliente, nome_cliente FROM cliente ORDER BY nome_cliente";
                $stmt = $conexao->prepare($sql);
                $result = $stmt->execute();
                $linha = $stmt->fetchAll(PDO::FETCH_ASSOC);//PDO::FETCH_ASSOC retorna um array do tipo associativo

                return $linha;
            }catch(PDOException $ex){
                echo "Erro: {$ex->getMessage()}";
            }
        }

        public function retornaAtendentes(){
            try{
                $conexao = $this->conexaoDao->conecta();
                $sql = "SELECT id_atendente, nome_atendente FROM atendente ORDER BY nome_atendente";
                $stmt = $conexao->prepare($sql);
                $result = $stmt->execute();
                $linha = $stmt->fetchAll(PDO::FETCH_ASSOC);//PDO::FETCH_ASSOC retorna um array do tipo associativo

                return $linha;
            }catch(PDOException $ex){
                echo "Erro: {$ex->getMessage()}";
            }
        }

        public function cadastrarOS(Solicitacao $os){
            $id = $os->getId();
            $cliente = $os->getCliente();
            $atendente = $os->getAtendente();
            $tecnico = 1;
            $telefone = $os->getTelefone();
            $whatsapp = $os->getWhatsapp();
            $equipamento = $os->getEquipamento();
            $marca = $os->getMarca();
            $modelo = $os->getModelo();
            $problema_info = $os->getProblemaInfo();
            $problema_const = $os->getProblemaConst();
            $observacoes = $os->getObservacoes();
            $status = $os->getStatus();
            $data = $os->getDataSolicitacao();
            
            try{
                $conexao = $this->conexaoDao->conecta();
                $sql = "INSERT INTO solicitacao(id_solicitacao, atendente, cliente, tecnico, telefone, whatsapp, equipamento, marca, modelo, problema_info, problema_const, observacao, estado, data_solicitacao) VALUES (:id_solicitacao, :atendente, :cliente, :tecnico, :telefone, :whatsapp, :equipamento, :marca, :modelo, :problema_info, :problema_const, :observacao, :estado, :data_solicitacao)";
                $stmt = $conexao->prepare($sql);
                $stmt->bindParam(":id_solicitacao", $id);
                $stmt->bindParam(":atendente", $atendente);
                $stmt->bindParam(":cliente", $cliente);
                $stmt->bindParam(":tecnico", $tecnico);
                $stmt->bindParam(":telefone", $telefone);
                $stmt->bindParam(":whatsapp", $whatsapp);
                $stmt->bindParam(":equipamento", $equipamento);
                $stmt->bindParam(":marca", $marca);
                $stmt->bindParam(":modelo", $modelo);
                $stmt->bindParam(":problema_info", $problema_info);
                $stmt->bindParam(":problema_const", $problema_const);
                $stmt->bindParam(":observacao", $observacoes);
                $stmt->bindParam(":estado", $status);
                $stmt->bindParam(":data_solicitacao", $data);
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

        public function retornaOrdens(){
            try{
                $conexao = $this->conexaoDao->conecta();
                $sql = "SELECT * FROM solicitacao ORDER BY id_solicitacao DESC";
                $stmt = $conexao->prepare($sql);
                $result = $stmt->execute();
                $os = $stmt->fetchAll(PDO::FETCH_ASSOC);

                return $os;
            }catch(PDOException $ex){
                echo "Erro: ". $ex->getMessage();
            }
        }

        public function retornaOrdemDesc($id){
            try{
                $conexao = $this->conexaoDao->conecta();
                $sql = "SELECT * FROM solicitacao WHERE id_solicitacao = :id_solicitacao";
                $stmt = $conexao->prepare($sql);
                $stmt->bindParam(":id_solicitacao", $id);
                $result = $stmt->execute();

                $os = $stmt->fetch();
                return $os;
            }catch(PDOException $ex){
                echo "Erro: ". $ex->getMessage();
            }
        }

        public function retornaClienteOs($id){
            try{
                $conexao = $this->conexaoDao->conecta();
                $sql = "SELECT nome_cliente FROM cliente WHERE id_cliente = :id_cliente";
                $stmt = $conexao->prepare($sql);
                $stmt->bindParam(":id_cliente", $id);
                $result = $stmt->execute();
                $nome = $stmt->fetch();

                return $nome;
            }catch(PDOException $ex){
                echo "Erro: ". $ex->getMessage();
            }
        }

        public function alterarOrdem(Solicitacao $os){
            $id = $os->getId();
            $telefone = $os->getTelefone();
            $whatsapp = $os->getWhatsapp();
            $equipamento = $os->getEquipamento();
            $marca = $os->getMarca();
            $modelo = $os->getModelo();
            $problema_info = $os->getProblemaInfo();
            $observacoes = $os->getObservacoes();
            try{
                $conexao = $this->conexaoDao->conecta();
                $sql = "UPDATE solicitacao SET telefone = :telefone, whatsapp = :whatsapp, equipamento = :equipamento, marca = :marca, modelo = :modelo, problema_info = :problema_info, observacao = :observacao WHERE id_solicitacao = :id_solicitacao";
                $stmt = $conexao->prepare($sql);
                $stmt->bindParam(":telefone", $telefone);
                $stmt->bindParam(":whatsapp", $whatsapp);
                $stmt->bindParam(":equipamento", $equipamento);
                $stmt->bindParam(":marca", $marca);
                $stmt->bindParam(":modelo", $modelo);
                $stmt->bindParam(":problema_info", $problema_info);
                $stmt->bindParam(":observacao", $observacoes);
                $stmt->bindParam(":id_solicitacao", $id);
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

        public function pesquisaOrdem($palavra){
            $item = "%{$palavra}%";
            try{
                $conexao = $this->conexaoDao->conecta();
                $sql = "SELECT * FROM solicitacao WHERE telefone LIKE :item OR id_solicitacao LIKE :item OR equipamento LIKE :item OR marca LIKE :item OR modelo LIKE :item";
                $stmt= $conexao->prepare($sql);
                $stmt->bindParam(":item", $item);
                $result = $stmt->execute();
                $os = $stmt->fetchAll(PDO::FETCH_ASSOC);

                return $os;

            }catch(PDOException $ex){
                echo "Erro: ". $ex->getMessage();
            }
        }

        public function excluiOrdem(Solicitacao $ordem){
            $id = $ordem->getId();
            try{
                $conexao = $this->conexaoDao->conecta();
                $sql = "DELETE FROM solicitacao WHERE id_solicitacao = :id";
                $stmt = $conexao->prepare($sql);
                $stmt->bindParam(":id", $id);
                $result = $stmt->execute();

            }catch(PDOException $ex){
                echo "Erro: " . $ex->getMessage();
            }
        }

    }
?>