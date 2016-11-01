<?php

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
        $query = "SELECT `name` FROM `urealms`";

        foreach ($this->link->query($query) as $row) {
            $characterInformation[] = new CharacterInformation($row['name'], 'lastname', 'race', 'subrace', 'gender', 'class');
        }
        return $characterInformation;
    }
}