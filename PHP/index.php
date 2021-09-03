<?php
    require_once "./Sistema/autoload.php";

    $pages = [
        'home' => new Main(),
        'resumos' => new Resumos(),
        'busca' => new Busca(),
        'quemsomos' => new QuemSomos(),
        'feedback' => new Feedback(),
        'sobre' => new Sobre()
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
    <nav class="topo" id="navTopo" style="width: 100%;">
        <?php
            $clNav = new Nav();
            echo $clNav->mostraNav();
        ?>
    </nav>

    <main>
        <?php
            $pagina = (isset($_GET["page"]) ? $_GET["page"] : "home" );

            if (!array_key_exists($pagina, $pages)) {
                $pagina = "home";
            }

            echo $pages[$pagina]->mostraMain();
        ?>
          
    </main>

    <footer class="footer2">
        <?php
        
            $clFooter = new Footer();
            echo $clFooter->mostraFooter();
    
        ?>
    </footer>
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