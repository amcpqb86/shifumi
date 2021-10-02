<?php

/* Require classes */

require("./classes/Strategy.php");
require("./classes/Game.php");
require("./classes/Player.php");



$game = new Game(5);
$game->play();


?>