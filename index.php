<?php

ini_set('display_errors', 1); // Afficher les erreurs à l'écran
error_reporting(E_ALL); // Afficher les erreurs et les avertissements

// Insertion des classes PHP
require 'vendor/autoload.php';

use \App\occurrenceInArray as occurrenceIn;

$tab = [
    [1, 5, 8, 8, 9, 6, 8, 5, 8, 8, 3, 6, 2, 9, 8, 5, 1],
    [2, 8, 8, 8, 8, 5, 6, 7, 7, 8, 8, 7, 7, 8, 5, 8, 1],
    [8, 1, 4, 2, 5, 4, 8, 5, 8, 6, 9, 8, 8, 8, 4, 5, 5],
    [8, 8, 5, 4, 8, 8, 9, 5, 6, 8, 8, 9, 8, 8, 9, 8, 7],
    [8, 5, 4, 8, 5, 4, 2, 5, 4, 8, 6, 9, 8, 5, 8, 5, 5],
    [8, 5, 2, 1, 4, 1, 2, 0, 3, 2, 6, 9, 8, 8, 8, 8, 8],
    [1, 4, 2, 5, 4, 1, 2, 3, 6, 5, 4, 8, 8, 8, 8, 8, 8],
    [8, 4, 2, 1, 5, 4, 1, 2, 0, 1, 2, 0, 1, 2, 5, 4, 8],
    [8, 6, 5, 4, 8, 5, 2, 5, 8, 8, 8, 5, 4, 2, 1, 4, 5],
    [8, 2, 1, 5, 4, 1, 2, 8, 8, 8, 8, 2, 8, 4, 2, 8, 8],
    [8, 5, 2, 1, 4, 8, 8, 8, 5, 4, 5, 8, 8, 8, 5, 4, 8],
    [8, 3, 2, 5, 4, 1, 2, 5, 8, 8, 8, 8, 8, 8, 8, 8, 8],
    [9, 8, 5, 4, 5, 8, 7, 4, 5, 4, 7, 8, 8, 8, 5, 4, 5],
    [8, 9, 5, 4, 8, 5, 2, 5, 8, 8, 8, 5, 4, 8, 8, 5, 5],
    [8, 4, 8, 5, 4, 8, 5, 4, 8, 2, 1, 5, 4, 8, 8, 8, 8],
    [8, 3, 5, 8, 8, 9, 8, 8, 5, 2, 8, 5, 8, 8, 8, 8, 8]
];

echo (new occurrenceIn($tab))->findAllOccurrenceOf(88);