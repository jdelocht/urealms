<?php

namespace application;

use domain\CharacterInformation;
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

    public function getCharacterInformation($character)
    {
        $characterInformation = [];
        $query = "SELECT `name`, `last_name`, `race`, `sub_race`, `gender`, `class` FROM `urealms`";

        foreach ($this->link->query($query) as $row) {
            $characterInformation[] = new CharacterInformation($row['name'], $row['last_name'], $row['race'], $row['sub_race'], $row['gender'], $row['class']);
        }
        return $characterInformation;
    }
}