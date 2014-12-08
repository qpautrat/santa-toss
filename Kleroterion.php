<?php

namespace QPautrat\SantaToss;

/**
 * @author qpautrat <quentin.pautrat@gmail.com>
 */
class Kleroterion
{
    /**
     * Shuffle people
     *
     * @param  array $people
     * @return array
     */
    public function toss($people)
    {
        if (!is_array($people)) {
            throw new \Exception("You must provide an array of person.");
        }

        $nbPerson = count($people);

        if (3 > $nbPerson) {
            throw new \Exception("Come on, don't cheat.");
        }

        if (count(array_unique($people)) < $nbPerson) {
            throw new \Exception("There are duplicate names in the list");
        }

        shuffle($people);

        $pairs = array();

        foreach ($people as $key => $person) {
            if (!isset($people[$key + 1])) {
                $pairs[] = array($person, $people[0]);
            } else {
                $pairs[] = array($person, $people[$key + 1]);
            }
        }

        return $pairs;
    }
}