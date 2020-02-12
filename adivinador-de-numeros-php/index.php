<?php

$play_count = 0;
$correct_guesses = 0;
$guess_high = 0;
$guess_low = 0;

echo "Voy a pensar en números entre 1 y 10 (inclusive). ¿Crees que puedes adivinar correctamente?\n";

function guessNumber()
{
    global $guess_high, $guess_low, $correct_guesses, $play_count;

    $play_count++;

    $num = rand(1, 10);

    echo "\nHaz tu conjetura...\n";

    $guess = intval(readline(">> "));

    echo "Round: $play_count\nMi número: $num\nTu conjetura: $guess";

    if ($guess === $num){
        $correct_guesses++; 
    }

    if ($guess > $num){
        $guess_high++;
    }

    if ($guess < $num){
        $guess_low++;
    }
}

guessNumber();
guessNumber();
guessNumber();
guessNumber();
guessNumber();
guessNumber();
guessNumber();
guessNumber();
guessNumber();
guessNumber();

$percent_correct = $correct_guesses/$play_count * 100;

echo "\nDespués de las $play_count rondas, aquí hay algunos datos sobre sus conjeturas: \nAdivinó el número correctamente $percent_correct% del tiempo.\n";

if ($guess_high > $guess_low) {
    echo "Cuando adivinaste mal, tendías a adivinar alto";
} else if ($guess_high < $guess_low) {
    echo "Cuando adivinaste mal, tendías a adivinar bajo";
}

