<?php

session_start();


class Game
{
    public function __construct()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->saveChoice($_POST);
        }

        if ($this->getGameMode() === 'single') {
            $this->saveChoice([
                'id' => 2,
                'choice' => $this->getRandomOption()
            ]);
        }
    }
    public function playerChoice($playerId)
    {
        return isset($_SESSION["player_" . $playerId]);
    }

    public function getCurrentPlayer()
    {
        return $this->playerChoice(1) ? 2 : 1;
    }

    public function saveChoice($form)
    {
        $id = $form["id"];
        $choice = $form["choice"];
        $_SESSION["player_" . $id] = $choice;
    }

    public function compare()
    {
        $player1 = $this->getChoice(1);
        $player2 = $this->getChoice(2);
        session_destroy();
        if ($player1 == $player2) {
            return "It's a tie!";
        } elseif ($player1 == "rock" && $player2 == "scissors") {
            return "Player 1 wins";
        } elseif ($player1 == "scissors" && $player2 == "paper") {
            return "Player 1 wins";
        } elseif ($player1 == "paper" && $player2 == "rock") {
            return "Player 1 wins";
        } else {
            return "Player 2 wins";
        }
    }

    public function getChoice($playerId)
    {
        return $_SESSION["player_" . $playerId];
    }

    public function getGameMode()
    {
        return $_GET["mode"] ?? "";
    }

    public function getRandomOption() 
    {
        $choices = ["rock", "paper", "scissors"];
        return $choices[rand(0, 2)];
    }
}
$game = new Game();
