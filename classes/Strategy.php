<?php

interface Strategy {
    public function execute();
}

class SamePlay implements Strategy {
    public function execute()
    {
        return "Pierre";
    }
}

class RandomPlay implements Strategy {
    public function  execute()
    {
        $rand = rand(0, 2);
        switch ($rand){
            case 0 :
                return "Pierre";
                break;
            case 1 :
                return "Feuille";
                break;
            case 2 :
                return "Ciseaux";
                break;
        }
    }
}

class CyclicPlay implements Strategy {
    private $prochainCoup;
    private $listeDeCoups = array("Pierre", "Feuille", "Ciseaux");

    public function __construct()
    {
        $this->prochainCoup = 0;
    }

    public function execute()
    {
        switch ($this->prochainCoup) {
            case 0 :
                $this->prochainCoup = 1;
                break;
            case 1 :
                $this->prochainCoup = 2;
                break;
            case 2 :
                $this->prochainCoup = 0;
                break;
        }
        return $this->listeDeCoups[$this->prochainCoup];
    }
}

?>