<?php

class Feedback {

    function mostraMain() {
        include ("/xampp/htdocs/Monkay/PHP/Sistema/Comment.php");

        echo '<form action=" " method="GET" name="form">
        <div class="feedback">
            <h3>Digite abaixo seu feedback!</h3>

            <br>Título:<p><input class="form-control" type="text" name="titulo" id="title" maxlength="30" placeholder="Título do seu comentário..." required></p>
            <br>Comentário: <p> <textarea class="form-control comment" name="comentario" id="txt" maxlength="3000" placeholder="Seu comentário..." required></textarea></p>
            <input type="hidden" name="page" value="feedback"></input>

            <button class="btn btn-success" type="submit">Enviar!</button>
        </div>
        </form>';
    }


}