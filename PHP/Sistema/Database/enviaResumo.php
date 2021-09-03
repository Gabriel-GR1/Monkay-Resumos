<?php

class Resumo {

    public function envia($titulo, $resumo, $urlImagem) {
        require_once "conection.php";

        $titulo = mysqli_real_escape_string($conexao, $titulo);
        $resumo = mysqli_real_escape_string($conexao, $resumo);
        $urlImagem = mysqli_real_escape_string($conexao, $urlImagem);

        /*
        echo $titulo;
        echo $resumo;
        echo "<img src=' ".$urlImagem. " ' alt=''"; */

        $query = "select titulo, resumo, fundo from resumo where titulo = '{$titulo}' or resumo = '{$resumo}' and fundo = '{$urlImagem}'";

        $resultado = mysqli_query($conexao, $query);

        $linha = mysqli_num_rows($resultado);

        if ($linha >= 1) {
            echo "Titulo / Resumo / com essa imagem de fundo já estão sendo usados!";
        } else {
            $query = "insert into resumo (titulo, resumo, fundo) values ('{$titulo}', '{$resumo}', '{$urlImagem}')";
            mysqli_query($conexao, $query);
        }

    }

    public function mostraTabela() {
        require_once "conection.php";

        $query = "select titulo, resumo, fundo from resumo";

        $resultado = mysqli_query($conexao, $query);

        $linha = mysqli_num_rows($resultado);

        if ($linha >= 1) {
            while ($linha = $resultado->fetch_assoc()) {
                echo "<br>titulo: ".$linha["titulo"]." <br>resumo: ". $linha["resumo"] ." <br>fundo: "."<img src='".$linha["fundo"]."'>";
            }
        }
    }

}