<?php

    class galeriaController extends Controller{
        public function index() {
            $dados = array(
                'qtd' => 150
            );

            $this -> loadTemplate('galeria', $dados);
        }

      
    }


?>