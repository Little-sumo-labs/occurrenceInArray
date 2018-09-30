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


    private $nbOccurrence = 0;

    /**
     * occurrenceInArray constructor.
     * @param array $tab
     */
    public function __construct(array $tab = []){
        $this->tab = $tab;
        [$this->nbLigne, $this->nbColonne] = $this->getArraySize();
    }

    /**
     * Count all occurrence in an array
     *
     * @param int $occurrence
     * @return int
     */
    public function findAllOccurrenceOf(int $occurrence): int {
        $NbLigneArray = count($this->tab);

        foreach ($this->tab as $key => $ligne) {
            $NbColonne  = count($ligne)-1;

            // prendre les chiffres de la ligne 2 par 2
            for ($i = 0; $i < $NbColonne; $i++) {
                $occurrenceInTab = intval($this->tab[$key][$i].$this->tab[$key][$i+1]);

                // comptage en horizontal
                if ($occurrenceInTab === $occurrence) {
                    $this->nbOccurrence++;
                }

                // comptage en vertical
                if ($key+1 < $NbColonne) {
                    $occurrenceInTab = intval($this->tab[$key][$i].$this->tab[$key+1][$i]);

                    if ($occurrenceInTab === $occurrence) {
                        $this->nbOccurrence++;
                    }
                }

                // comptage en diagonale

            }
        }

        return $this->nbOccurrence;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function getArraySize(): array {
        $colonneTemp = [];
        $nombreDeLigne = count($this->tab);

        // Pour chaque lignes du tableau, on calcule le nombre de colonne
        // on enregistre

        foreach ($this->tab as $key => $value) {
            $colonneTemp[] = count($value);
        }
        $nbColonne = array_unique($colonneTemp);

        switch (count($nbColonne)) {
            case 0:
                $reponse = "Le tableau est vide";
                break;
            case 1:
                $nombreDeColonne = $nbColonne[0];
                break;
            default:
                $reponse = "Ils manquent des informations dans le tableau en entrée";
                break;
        }

        if (!empty($reponse)) {
            throw new \Exception($reponse);
        } else if (!empty($nombreDeColonne)){
            return [$nombreDeLigne,$nombreDeColonne];
        } else {
            throw new \Exception('Bug qui ne devrait pas arrivé');
        }
    }
}