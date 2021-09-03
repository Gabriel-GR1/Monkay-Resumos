<?php

class Comment {

    public function envia() {
        include("/xampp/htdocs/Monkay/PHP/Sistema/Database/conection.php");

        $titulo = $_GET['titulo'];
        $comentario = $_GET['comentario'];

        $titulo = mysqli_real_escape_string($conexao, $titulo);
        $comentario = mysqli_real_escape_string($conexao, $comentario);

        $query = $conexao->prepare("insert into comentario (titulo, comentario) values ('{$titulo}', '{$comentario}')");
        $query->execute();

        echo '<div class="alert alert-success" role="alert">
                Comentário enviado com sucesso!
                </div>';

        
    }

    public function verifica() {
        if (empty($_GET['titulo']) || empty($_GET['comentario'])) {
        
        } else {
            $this->envia();
        }
    }

}

?>

<?php
            $tClass = new Comment();
            $tClass->verifica();
?>