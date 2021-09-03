<?php
    spl_autoload_register( 
        function($classe) {
            require "$classe.php";
        }
    );

    spl_autoload_register( 
        function($classe) {
            require "./Database/"."$classe.php";
        }
    );
?>