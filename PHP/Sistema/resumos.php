<?php

class Resumos {
    public function geraContent() {
        include "/xampp/htdocs/Monkay/PHP/Sistema/Database/conection.php";
        
        $query = "select titulo, fundo, resumo from resumo order by titulo";

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

    public function mostraResumo($valor) {
        include "/xampp/htdocs/Monkay/PHP/Sistema/Database/conection.php";
        
        $query = "select resumo from resumo where titulo = '$valor';";

        $resultado = mysqli_query($conexao, $query);

        $linhas = mysqli_num_rows($resultado);

        if ($linhas > 0) {
            while($linhas = mysqli_fetch_assoc($resultado)) {
                echo $linhas["resumo"];
            }
        }

    }

    private function geraGrid() {
        $pagina = (isset($_GET['resumo']) ? $_GET['resumo'] : '' );

        if (!empty($pagina)) {
            echo $this->mostraResumo($pagina);
        } else {
            echo '<div class="resumosGrid2">';
            echo $this->geraContent();
            echo '</div>';
        }
    }

    public function mostraMain() {
        echo $this->geraGrid();
    }
}

?>