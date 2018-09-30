<?php
namespace App;

/**
 * https://www.linkedin.com/feed/update/urn:li:activity:6451381733127393281
 * Permet de calculer, dans un tableau, le nombre d'occurrence d'une valeur donné en paramètre
 *
 * Class occurrenceInArray
 * @author Guillaume RICHARD <g.jf.richard@gmail.com>
 * @package App
 */
class occurrenceInArray {

    /**
     * occurrenceInArray constructor.
     */
    public function __construct(){}

    /**
     * Count all occurrence in an array
     *
     * @param int $occurrence
     * @param array $tab
     * @return int
     */
    public function findAllOccurrence(int $occurrence, array $tab = []): int {
        $nbOccurrence = 0;
        $NbLigneArray = count($tab);

        foreach ($tab as $key => $ligne) {
            $NbColonne  = count($ligne)-1;

            // prendre les chiffres de la ligne 2 par 2
            for ($i = 0; $i < $NbColonne; $i++) {
                $occurrenceInTab = intval($tab[$key][$i].$tab[$key][$i+1]);

                // comptage en horizontal
                if ($occurrenceInTab === $occurrence) {
                    $nbOccurrence++;
                }

                // comptage en vertical
                if ($key+1 < $NbColonne) {
                    $occurrenceInTab = intval($tab[$key][$i].$tab[$key+1][$i]);

                    if ($occurrenceInTab === $occurrence) {
                        $nbOccurrence++;
                    }
                }
            }
        }

        return $nbOccurrence;
    }
}