<?php

namespace application;

use domain\CharacterInformation;
use domain\Gender;
use Exception;
use PDO;

/**
 * @since 1.0
 * @author Echodes / Joost de Locht
 */
class CharacterInformationPdoRepository implements CharacterInformationRepository
{
    /**
     * @var PDO
     */
    private $link;

    /**
     * CharacterInformationPdoRepository constructor.
     * @param PDO $link
     */
    public function __construct(PDO $link)
    {
        $this->link = $link;
    }

    /**
     * @param $race
     * @return array
     */
    public function getCharacterInformation($race)
    {
        $characterInformation = [];
        $query = "SELECT `name`, `last_name`, `race`, `sub_race`, `gender`, `class` FROM `urealms` WHERE `race` = '$race'";


        foreach ($this->link->query($query) as $row) {
            try {
                $characterInformation[] = new CharacterInformation($row['name'], $row['last_name'], $row['race'], $row['sub_race'], new Gender($row['gender']), $row['class']);
                } catch (Exception $e) {
                    echo 'Caught exception: The given Gender must be either Male or Female';
                }
        }

        return $characterInformation;
    }

    /**
     * @param CharacterInformation $character
     * @return \PDOStatement
     */
    public function saveCharacter(CharacterInformation $character)
    {
        $query = "INSERT INTO `urealms` (`name`, `last_name`, `race`, `sub_race`, `gender`, `class`) VALUES (
        '" . $character->getCharacterName() . "',
        '" . $character->getCharacterLastName() . "',
        '" . $character->getCharacterRace() . "',
        '" . $character->getCharacterSubRace() . "',
        '" . $character->getGender() . "',
        '" . $character->getCharacterClass() . "')";

        return $this->link->query($query);
    }
}