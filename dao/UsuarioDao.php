<?php
    require_once("conexaoDao.php");
    class UsuarioDao{
        private $connect;

        public function __construct(){
            $this->connect = new ConexaoDao();
        }

        public function cadastraUser(Usuario $usuario){
            $userNome = $usuario->getNome();
            $userEmail = $usuario->getEmail();
            $userSenha = $usuario->getSenha();
            try{
                $conexao = $this->connect->conecta();

                $sql = "INSERT INTO usuario(nome, email, senha) VALUES (:nome, :email, :senha)";
                $stmt = $conexao->prepare($sql);
                $stmt->bindParam(":nome", $userNome);
                $stmt->bindParam(":email", $userEmail);
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
            $userEmail = $usuario->getEmail();
            try{
                $conexao = $this->connect->conecta();

                $sql = "SELECT email FROM usuario WHERE email = :email";
                $stmt = $conexao->prepare($sql);
                $stmt->bindParam(":email", $userEmail);
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

        public function autenticaLogin(Usuario $user){
            $userEmail = $user->getEmail();
            $userSenha = $user->getSenha();
            try{
                $conexao = $this->connect->conecta();
                $sql = "SELECT email, senha FROM usuario WHERE email = :email AND senha = :senha";
                $stmt = $conexao->prepare($sql);
                $stmt->bindParam(":email", $userEmail);
                $stmt->bindParam(":senha", $userSenha);
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
    }
?>