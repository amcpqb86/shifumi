<?php
class Game {
    private $player1;
    private $player2;
    private $nbreTours;

    public function __construct($nbreTours)
    {
        $this->nbreTours = $nbreTours;
    }

    public function play ()
    {
        $this->player1 = new Player();
        $this->player1->setStrategy(new RandomPlay());
        $this->player2 = new Player();
        $this->player2->setStrategy(new CyclicPlay());

        for ($i = 0 ; $i < $this->nbreTours ; $i++){
            $currentWinner = $this->determineWinner($this->player1->makeCoup(), $this->player2->makeCoup());
            if ($currentWinner == 0){
                $this->player1->incrementScore(1);
                $this->player2->incrementScore(1);
                echo "Egalité entre les deux joueurs !\n\n";
            }
            else if ($currentWinner == 1){
                $this->player1->incrementScore(2);
                echo "Le joueur 1 remporte cette manche !\n\n";
            }
            else if ($currentWinner == 2){
                $this->player2->incrementScore(2);
                echo "Le joueur 2 remporte cette manche !\n\n";
            }
        }

        if ($this->player1->getScore() == $this->player2->getScore()){
            echo "\nÉgalité !\n";
        }
        else if ($this->player1->getScore() > $this->player2->getScore()){
            echo "\nLe gagnant est le joueur 1 avec ".strval($this->player1->getScore())." points !\n";
        }
        else {
            echo "\nLe gagnant est le joueur 2 avec ".strval($this->player2->getScore())." points !\n";
        }

    }

    public function determineWinner ($coupP1, $coupP2){
        $winner = 0;
        if ($coupP1 == "Feuille" && $coupP2 == "Pierre"){
            $winner = 1;
        }
        else if ($coupP2 == "Feuille" && $coupP1 == "Pierre"){
            $winner = 2;
        }
        else if ($coupP1 == "Pierre" && $coupP2 == "Ciseaux"){
            $winner = 1;
        }
        else if ($coupP2 == "Pierre" && $coupP1 == "Ciseaux"){
            $winner = 2;
        }
        else if ($coupP1 == "Ciseaux" && $coupP2 == "Feuille"){
            $winner = 1;
        }
        else if ($coupP2 == "Ciseaux" && $coupP1 == "Feuille") {
            $winner = 2;
        }

        echo "Joueur 1 : ".$coupP1."\nJoueur 2 : ".$coupP2."\n";


        return $winner;
    }
}
?>