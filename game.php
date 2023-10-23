<?php

include('functions.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/6851/6851302.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
     integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" 
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" 
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Rock Paper Scissors</title>
</head>

<body>
    <div class="container py-4">
        <h2>Rock Paper Scissors</h2>
        <form method="post">
            <div class="row">
                <?php if (!$game->playerChoice(1) || (!$game->playerChoice(2) && $game->getGameMode() === 'multi')) : ?>
                    <div class="col-md-6">
                        <h3>Player <?= $game->getCurrentPlayer() ?></h3>
                        <input type="text" name="id" value="<?= $game->getCurrentPlayer() ?>" hidden>
                        <label for="choice">Select your choice</label>
                        <select class="form-control" name="choice" id="keuze">
                            <option value="rock">rock</option>
                            <option value="paper">paper</option>
                            <option value="scissors">scissors</option>
                        </select>
                        <button class="btn btn-primary mt-4">submit</button>
                    </div>
                <?php else : ?>
                    <div class="col">
                        <p>Player 1 chose <b><?= $game->getChoice(1) ?></b></p>
                        <?php if ($game->getGameMode() === 'single') : ?>
                            <p>Computer chose <b><?= $game->getChoice(2) ?></b></p>
                        <?php else : ?>
                            <p>Player 2 chose <b><?= $game->getChoice(2) ?></b></p>
                        <?php endif ; ?>
                        <h2 class="text-align-center"><?= $game->compare() ?></h2>
                        <a href="index.php" class="btn btn-primary">new game</a>
                    </div>
                <?php endif; ?>
            </div>
        </form>
    </div>
</body>

</html>