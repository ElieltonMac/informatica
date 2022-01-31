<?php
    require_once("dao/UsuarioDao.php");

    class UsuarioControl{
        private $usuarioDao;

        public function __construct(){
            $this->usuarioDao = new UsuarioDao();
        }

        public function validaCadastro(Usuario $user){
            if(strlen($user->getNome()) > 3 && strlen($user->getSenha()) > 7){
                $senha = md5($user->getSenha());
                $senha = substr_replace($senha, "e", 13, 0);
                $senha = substr_replace($senha, "f", -3, 0);

                $user->setSenha($senha);

                $resultado = $this->usuarioDao->consultaCad($user);

                switch($resultado){
                    case 1:
                        if($this->usuarioDao->cadastraUser($user) == 1){
                            return 1;
                        }else{
                            return -2;
                        }
                    break;
                    case -1:
                        return -1;
                    break;
                }
            }else{
                return -3;
            }
        }

        public function validaLogin(Usuario $user){
           if(strlen($user->getSenha()) > 7){
                $pass = md5($user->getSenha());
                $pass = substr_replace($pass, "e", 13, 0);
                $pass = substr_replace($pass, "f", -3, 0);
                $user->setSenha($pass);
                echo $user->getSenha();
                $result = $this->usuarioDao->autenticaLogin($user);
                switch($result){
                    case 1:
                        return 1;
                    break;
                    case -5:
                        return -4;
                    break;
                }
            }else{
                return -3;
            }
        }
    }
?>