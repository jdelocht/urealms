<?php

namespace application;

use domain\Character;
use domain\Gender;
use domain\Race;
use domain\SubRace;
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
                $characterInformation[] = new Character($row['name'], $row['last_name'], new Race($row['race'], new SubRace($row['sub_race'])), new Gender($row['gender']), $row['class']);
                } catch (Exception $e) {
                    echo 'Caught exception: One or more of the given values are not allowed';
                }
        }

        return $characterInformation;
    }

    /**
     * @param Character $character
     * @return \PDOStatement
     */
    public function saveCharacter(Character $character)
    {
        $query = "INSERT INTO `urealms` (`name`, `last_name`, `race`, `sub_race`, `gender`, `class`) VALUES (
        '" . $character->getCharacterName() . "',
        '" . $character->getCharacterLastName() . "',
        '" . $character->getCharacterRace() . "',
        '" . $character->getSubRace() . "',
        '" . $character->getGender() . "',
        '" . $character->getCharacterClass() . "')";

        return $this->link->query($query);
    }
}