<?php
    require_once "./Sistema/autoload.php";

    $ObPags = [
        $home = new Main(),
        $resumos = new Resumos()
    ];

    $pages = [
        "home" => $ObPags[0]->mostraMain(),
        
    ]
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
            $clComment = new Comment();
            if (empty($_GET['titulo']) || empty($_GET['comentario'])) {
                /*header('location: ?page=feedback');*/
            } else {
                $clComment->verifica();
            }
    
        ?>
        <form>
        <div class="feedback">
            <h3>Digite abaixo seu feedback!</h3>

            <br>Título:<p><input class="form-control" type="text" name="titulo" id="title" maxlength="30" placeholder="Título do seu comentário..." required></p>
            <br>Comentário: <p> <textarea class="form-control comment" name="comentario" id="txt" maxlength="3000" placeholder="Seu comentário..." required></textarea></p>

            <button class='btn btn-success' type='submit'>Enviar!</button>
        </div>
        </form>

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