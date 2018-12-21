<?php

class anunciosController extends controller {

    public function index() {

        $dados = array();

        if(empty($_SESSION['cLogin'])) {
            header("Location: ".BASE_URL."login");
            exit;
        }

        $a = new Anuncios();
        $anuncios = $a->getMeusAnuncios();
        $dados['anuncios'] = $anuncios;


        $this->loadTemplate('anuncios',$dados);

    }

    public function add() {

        $dados = array();

        if(empty($_SESSION['cLogin'])) {
            header("Location: ".BASE_URL."login");
            exit;
        }

        $a = new Anuncios();
        if(isset($_POST['titulo']) && !empty($_POST['titulo'])) {

            $titulo = addslashes($_POST['titulo']);
            $categoria = addslashes($_POST['categoria']);
            $valor = addslashes($_POST['valor']);
            $descricao = addslashes($_POST['descricao']);
            $estado = addslashes($_POST['estado']);

            $a->addAnuncio($titulo, $categoria, $valor, $descricao, $estado);
            $dados['msg'] = '<div class="alert alert-success">
                Produto adicionado com sucesso!
            </div>';
        }

        $c = new Categorias();
        $categorias = $c->getLista();
        $dados['categorias'] = $categorias;

        $this->loadTemplate('add',$dados);

    }

    public function editar($id) {

        $dados = array();

        if(empty($_SESSION['cLogin'])) {
            header("Location: ".BASE_URL."login");
            exit;
        }

        $a = new Anuncios();
        if(isset($_POST['titulo']) && !empty($_POST['titulo'])) {

            $titulo = addslashes($_POST['titulo']);
            $categoria = addslashes($_POST['categoria']);
            $valor = addslashes($_POST['valor']);
            $descricao = addslashes($_POST['descricao']);
            $estado = addslashes($_POST['estado']);
            if(isset($_FILES['fotos'])) {
                $fotos = $_FILES['fotos'];
            } else {
                $fotos = array();
            }

            $a->editAnuncio($titulo, $categoria, $valor, $descricao, $estado, $fotos, addslashes($id));
            $dados['msg'] = '<div class="alert alert-success">
                Produto editado com sucesso!
            </div>';
        }

        if(isset($id) && !empty($id)) {
            $infos = $a->getAnuncio(addslashes($id));
            $dados['infos'] = $infos;
        } else {
            header("Location :".BASE_URL."anuncios");
            exit;
        }

        $c = new Categorias();
        $categorias = $c->getLista();
        $dados['categorias'] = $categorias;

        $this->loadTemplate('editar',$dados);

    }

    public function excluirFoto($id) {

        $dados = array();

        if(empty($_SESSION['cLogin'])) {
            header("Location: ".BASE_URL."login");
            exit;
        }

        $a = new Anuncios();

        if(isset($id) && !empty($id)) {
            $id = addslashes(($id));
            $id_anuncio = $a->excluirFoto($id);
        }

        if(isset($id)) {
            header("Location: ".BASE_URL."anuncios/editar/".$id_anuncio);
        } else {
            header("Location: ".BASE_URL."anuncios");
        }


    }

    public function excluir($id) {

        $dados = array();

        if(empty($_SESSION['cLogin'])) {
            header("Location: ".BASE_URL."login");
            exit;
        }

        $a = new Anuncios();

        if(isset($id) && !empty($id)) {
            $id = addslashes(($id));
            $a->excluirAnuncio($id);
        }

        header("Location: ".BASE_URL."anuncios");

    }

}