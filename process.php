<?php
$answer1 = $_POST['emotion'];
$answer2 = $_POST['creature'];
$answer3 = $_POST['person'];
$answer4 = $_POST['consume'];

$bulbasaur = 0;
$kirby = 0;
$popcat = 0;
$gort = 0;

$highSore = 0;

switch($answer1) {
    case "ok":
        $kirby++;
        break;
    case "limit":
        $bulbasaur++;
        break;
    case "good":
        $popcat++;
        break;
    case "grr":
        $gort++;
        break;
    default:
        header('Location: index.php?error=blank');
        exit();
        break;
}

switch($answer2) {
    case "orb":
        $kirby++;
        break;
    case "lizard":
        $bulbasaur++;
        break;
    case "cat":
        $popcat++;
        break;
    case "insect":
        $gort++;
        break;
    default:
        header('Location: index.php?error=blank');
        exit();
        break;
}

switch($answer3) {
    case "cool":
        $kirby++;
        break;
    case "funny":
        $bulbasaur++;
        break;
    case "chill":
        $popcat++;
        break;
    case "crazy":
        $gort++;
        break;
    default:
        header('Location: index.php?error=blank');
        exit();
        break;
}

switch($answer4) {
    case "creatures":
        $kirby++;
        break;
    case "seeds":
        $bulbasaur++;
        break;
    case "bubble":
        $popcat++;
        break;
    case "plankton":
        $gort++;
        break;
    default:
        header('Location: index.php?error=blank');
        exit();
        break;
}

$highScore = $gort;
$winner = 'gort';

if ($popcat > $highscore) {
    $highScore = $popcat;
    $winner = 'popcat';
} else if ($bulbasaur > $highscore) {
    $highScore = $bulbasaur;
    $winner = 'bulbasaur';
} else if ($kirby > $highscore) {
    $highScore = $kirby;
    $winner = 'kirby';
}





$path = getcwd().'/data/results.txt';
file_put_contents($path, $winner . "\n", FILE_APPEND);
setcookie('winner', $winner);

header('Location: results.php');

?>