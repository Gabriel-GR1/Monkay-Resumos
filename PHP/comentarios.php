<?php
    require_once "./Sistema/autoload.php";

    $pages = [
        'home' => new Main(),
        'resumos' => new Resumos(),
        'busca' => new Busca(),
        'quemsomos' => new QuemSomos(),
        'feedback' => new Feedback()
    ];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php
        $clHead = new Head();
        $clHead->mostraHead();

    ?>
</head>

<body>

    <main>
        <h3>Comentários</h3>
        <?php
            include ("/xampp/htdocs/Monkay/PHP/Sistema/Database/conection.php");

            $query = "select * from comentario";

            $resultado = mysqli_query($conexao, $query);

            $linhas = mysqli_num_rows($resultado);

            if ($linhas > 0) {
                while($linhas = mysqli_fetch_assoc($resultado)) {
                    echo "<hr>";
                    echo "<p class='displayComment'>Id: ".$linhas["comment_id"];
                    echo "<br>Titulo: ".$linhas["titulo"];
                    echo "<br>Comentario: ".$linhas["comentario"]."</p>";
                    echo "<hr>";
                }
            } else {
                echo "<br> 0 ou sem mais comentários";
            }
        ?>
          
    </main>
</body>

<script>
    function hamburguer() {
        var x = document.getElementById("navTopo");
        if (x.className === "topo") {
            x.className += " responsivo";
        } else {
            x.className = "topo";
        }
    }
</script>

</html>