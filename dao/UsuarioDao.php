<?php
    require_once("ConexaoDao.php");
    class UsuarioDao{
        private $conexaoDao;

        public function __construct(){
            $this->conexaoDao = new ConexaoDao();
        }

        public function cadastraUser(Usuario $usuario){
            $userNome = $usuario->getUser();
            $userSenha = $usuario->getSenha();
            try{
                $conexao = $this->conexaoDao->conecta();

                $sql = "INSERT INTO usuario(nome_usuario, senha) VALUES (:nome_usuario, :senha)";
                $stmt = $conexao->prepare($sql);
                $stmt->bindParam(":nome_usuario", $userNome);
                $stmt->bindParam(":senha", $userSenha);

                $result = $stmt->execute();

                if($result == true){
                    return 1;//cadastrado com sucesso
                }else{
                    return -2;//erro ao cadastrar
                }
            }catch(PDOException $ex){
                
            }
        }

        public function consultaCad(Usuario $usuario){
            $user = $usuario->getEmail();
            try{
                $conexao = $this->conexaoDao->conecta();

                $sql = "SELECT nome_user FROM usuario WHERE nome_user = :nome_user";
                $stmt = $conexao->prepare($sql);
                $stmt->bindParam(":nome_user", $user);
                $result = $stmt->execute();
                $linha = $stmt->fetch();

                if(empty($linha)){
                    return 1;
                }else{
                    return -1;
                }
            }catch(PDOException $ex){

            }
        }

        public function autenticaLogin(Usuario $usuario){
            $user = $usuario->getUser();
            $senha = $usuario->getSenha();
            try{
                $conexao = $this->conexaoDao->conecta();
                $sql = "SELECT * FROM usuario WHERE nome_usuario = :nome_usuario AND senha = :senha";
                $stmt = $conexao->prepare($sql);
                $stmt->bindParam(":nome_usuario", $user);
                $stmt->bindParam(":senha", $senha);
                $result = $stmt->execute();

                $linha = $stmt->fetch();

                if(empty($linha)){
                    return -5;
                }else{
                    return 1;
                }
            }catch(PDOException $ex){

            }
        }

        public function retornaUsuarios(){
            try{
                $conexao = $this->conexaoDao->conecta();
                $sql = "SELECT * FROM usuario";
                $stmt = $conexao->prepare($sql);
                $result = $stmt->execute();
                
                $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if($result){
                    return $usuarios;
                }else{
                    return -1;
                }
            }catch(PDOException $ex){
                echo "Erro: ".$ex->getMessage();
            }
        }
    }
?>