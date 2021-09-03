<?php

class Footer {
    public $footer = '
            <p>
                Monkay resumos -2021<br>
                Todos os direitos reservados&#169
            </p>
            <img src="./img/logomamacocortada.png" alt="">';

    public function mostraFooter() {
        echo $this->footer;
    }
}

?>