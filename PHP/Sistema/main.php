<?php

class Main {

    public $banner = "<img src='img/Banner.png' alt='' style='width: 100%;'>";

    public $destaques = <<<EOT
        <div class="grid1 outZoomBack">
            <a href="?page=resumos&resumo=Segunda Guerra Mundial"><div class="zoomBack hitler destaqueImgLink">
                <div class="txtDestaque">
                    Segunda Guerra Mundial
                </div>
        </div>
            </a>
            <div class="grid2 outZoomBack">
                <a href="?page=resumos&resumo=Revolução Francesa">
                <div class="zoomBack francesa destaqueImgLink">
                    <div class="txtDestaque">
                        Revolução Francesa
                    </div>
                </div>
                </a>
            <a href="?page=resumos&resumo=Independencia do Brasil" class="destaqueImgLink">
                <div class="zoomBack independencia destaqueImgLink">
                    <div class="txtDestaque">
                        Independencia do Brasil
                    </div>
                </div>
                </a>
            </div>
        </div>
    EOT;

    public function mostraBanner() {
        return $this->banner;
    }

    public function mostraDestaques() {
        return $this->destaques;
    }

    public function mostraMain() {
        return $this->mostraBanner().$this->mostraDestaques();
    }

}

?>