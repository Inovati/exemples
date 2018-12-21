<?php

class cadastrarController extends controller {

    public function index() {

    $dados = array();

    $u = new Usuarios();
    if(isset($_POST['nome']) && !empty($_POST['nome'])) {

        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = $_POST['senha'];
        $telefone = addslashes($_POST['telefone']);

        if(!empty($nome) && !empty($email) && !empty($senha)) {
            if($u->cadastrar($nome, $email, $senha, $telefone)) {

                $dados['msg'] = '<div class="alert alert-success">
                    <strong>Parabéns!</strong> Cadastrado com sucesso. <a href="'.BASE_URL.'login" class="alert-link">Faça o login agora</a>
                </div>';

            } else {

                $dados['msg'] = '<div class="alert alert-warning">
                    Este usuário já existe! <a href="'.BASE_URL.'login" class="alert-link">Faça o login agora</a>
                </div>';
            }
        } else {
            $dados['msg'] = '<div class="alert alert-warning">
                Preencha todos os campos
            </div>';
         }

    }

        $this->loadTemplate('cadastrar',$dados);
    }


}