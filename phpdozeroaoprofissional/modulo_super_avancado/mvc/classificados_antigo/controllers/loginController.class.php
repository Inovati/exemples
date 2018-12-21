<?php
    class loginController extends Controller {

        public function index() {
            $dados = array();
            if (isset($_POST['email']) && !empty($_POST['email'])) {
                $email = addslashes($_POST['email']);
                $senha = addslashes($_POST['senha']);
    
                $u = new Usuarios();  
                if($u->login($email, $senha)) {
                    header("Location: ".BASE_URL."home");
                } else {
                    $dados['msg'] = '<div class="alert alert-danger">
                        Usuário e/ou Senha incorretos!
                    </div>';                }
            }
            $this->loadTemplate('login', $dados);

    
        }

        public function logout(){ 
            unset($_SESSION['cLogin']);
            header("Location: ". BASE_URL);
        }

    }



?>