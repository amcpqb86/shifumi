<?php


class Player {
    private $sonScore;
    private $saStrategie;

    public function getScore () {
        return $this->sonScore;
    }

    public function incrementScore ($nbreDePoints) {
        $this->sonScore += $nbreDePoints;
    }

    public function setStrategy (Strategy $strategy){
        $this->saStrategie = $strategy;
    }

    public function makeCoup () {
        return $this->saStrategie->execute();
    }
}
?>