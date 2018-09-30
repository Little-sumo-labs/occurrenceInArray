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
     * @var int
     */
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
        foreach ($this->tab as $keyLigne => $ligne) {
            // comptage en horizontal : 53
            foreach ($ligne as $keyColonne => $valueColonne) {
                if (($keyColonne+1) !== $this->nbColonne) {
                    $occurrenceInTab = intval($this->tab[$keyLigne][$keyColonne].$this->tab[$keyLigne][$keyColonne+1]);

                    if ($occurrenceInTab === $occurrence) {
                        $this->nbOccurrence++;
                    }
                }
            }

            // comptage en vertical : 46
            foreach ($ligne as $keyColonne => $v) {
                if ($keyLigne+1 < ($this->nbColonne-1)) {
                    $occurrenceInTab = intval($this->tab[$keyLigne][$keyColonne].$this->tab[$keyLigne+1][$keyColonne]);

                    if ($occurrenceInTab === $occurrence) {
                        $this->nbOccurrence++;
                    }
                }
            }

            // comptage en diagonale (partie 1) : 41
            foreach ($ligne as $keyColonne => $v) {
                if (
                    ($keyColonne+1) !== $this->nbColonne
                    && $keyLigne+1 < ($this->nbColonne-1)
                ) {
                    $occurrenceInTab = intval($this->tab[$keyLigne][$keyColonne].$this->tab[$keyLigne+1][$keyColonne+1]);

                    if ($occurrenceInTab === $occurrence) {
                        $this->nbOccurrence++;
                    }
                }
            }

            // comptage en diagonale (partie 2) : 44 ?
            // ne pas prendre dans ma boucle : la dernière colonne et la première ligne
            foreach ($ligne as $keyColonne => $v) {
                if (($keyColonne+1) !== $this->nbColonne&& $keyLigne > 0) {
                    $occurrenceInTab = intval($this->tab[$keyLigne][$keyColonne].$this->tab[$keyLigne-1][$keyColonne+1]);

                    if ($occurrenceInTab === $occurrence) {
                        $this->nbOccurrence++;
                    }
                }
            }
        }

        return $this->nbOccurrence;
    }

    /**
     * @return array
     * @throws \Exception
     */
    private function getArraySize(): array {
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