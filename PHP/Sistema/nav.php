<?php

class Nav {

public $nav = <<<EOT
    <img src='./img/logomamacocortada.png' alt='' class='icone'>
        <a href='javascript:hamburguer()' class='hamburguer' id='burgerA'>
            <i class='fa fa-bars'></i>
        </a>
            <br class='pedro'>
            <a href="?page=home">Home</a>
            <a href="?page=resumos">Resumos</a>
            <a href="?page=quemsomos">Quem Somos</a>
            <a href="?page=sobre">Sobre</a>
            <a href="?page=feedback">Feedback</a>
    
        <form action='?' method='GET' class='form-inline formNav' name=''>
            <div class='input-group mb-3'>
                <input type='text' class='form-control' placeholder='Buscar' name='busca'>
            <input type='hidden' name='page' value='busca'>
                <div class='input-group-append'>
                    <button class='btn btn-success lupa' type='submit'></button>
                </div>
              </div>
        </form>
    EOT;


    
    public function mostraNav() {
        return $this->nav;
    }
}

?>