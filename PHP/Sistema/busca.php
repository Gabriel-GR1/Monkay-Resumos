<?php

class Busca {

    function mostraBusca() {
        include "/xampp/htdocs/Monkay/PHP/Sistema/Database/conection.php";
        
        $query = "select titulo, fundo, resumo from resumo where titulo like '%".$_GET['busca']."%';";



        $resultado = mysqli_query($conexao, $query);

        $linhas = mysqli_num_rows($resultado);

        if ($linhas >= 1) {
            while ($linhas = $resultado->fetch_assoc()) {
                echo '<div class="outZoomBack">
                    <a href="?page=resumos&resumo='.$linhas["titulo"].'">
                        <div class="imageGridResumo" style="background-image: url('.$linhas["fundo"].');">
                            <p class="tituloResumoGrid">'
                            .$linhas["titulo"].
                            '</p>
                        </div>
                    </a>
                </div>';
            }
        }
    }

    function mostraMain() {
        $resultado = (isset($_GET['busca']) ? $_GET['busca'] : '' );

        if (!empty($resultado)) {
            echo '<div class="resumosGrid2">';
            echo $this->mostraBusca();
            echo '</div>';
        } else {
            header('location: ?page=resumos');
        }
    }

}