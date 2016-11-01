<?php

/**
 * @since 1.0
 * @author Echodes / Joost de Locht
 */
class CharacterInformation
{
    private $characterName;
    private $characterLastName;
    private $characterRace;
    private $characterSubRace;
    private $characterClass;

    /**
     * CharacterInformation constructor.
     * @param $characterName
     * @param $characterLastName
     * @param $characterRace
     * @param $characterSubRace
     * @param $characterClass
     */
    public function __construct($characterName, $characterLastName, $characterRace, $characterSubRace, $characterClass)
    {
        $this->characterName = $characterName;
        $this->characterLastName = $characterLastName;
        $this->characterRace = $characterRace;
        $this->characterSubRace = $characterSubRace;
        $this->characterClass = $characterClass;
    }

    public function getCharacterName()
    {
        return $this->characterName;
    }

    public function getCharacterLastName()
    {
        return $this->characterLastName;
    }

    public function getCharacterRace()
    {
        return $this->characterRace;
    }

    //Character sub races are about to be re-purposed, becoming character back stories. This will influence this parameter.
    public function getCharacterSubRace()
    {
        return $this->characterSubRace;
    }

    public function getCharacterClass()
    {
        return $this->characterClass;
    }
}