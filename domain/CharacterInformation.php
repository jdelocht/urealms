<?php
namespace domain;

/**
 * @since 1.0
 * @author Echodes / Joost de Locht
 */
class CharacterInformation
{
    /** @var string */
    private $characterName;
    /** @var string  */
    private $characterLastName;
    /** @var string */
    private $characterRace;
    /** @var string  */
    private $characterSubRace;
    /** @var string  */
    private $characterClass;
    /** @var Gender  */
    private $gender;

    /**
     * CharacterInformation constructor.
     * @param $characterName
     * @param $characterLastName
     * @param $characterRace
     * @param $characterSubRace
     * @param string $gender
     * @param $characterClass
     */
    public function __construct($characterName, $characterLastName, $characterRace, $characterSubRace, Gender $gender, $characterClass)
    {
        $this->characterName = $characterName;
        $this->characterLastName = $characterLastName;
        $this->characterSubRace = $characterSubRace;
        $this->characterClass = $characterClass;
        $this->gender = $this->getGender();
        $this->characterRace = $characterRace;
    }

    /**
     * @return string
     */
    public function getCharacterName()
    {
        return $this->characterName;
    }

    /**
     * @return string
     */
    public function getCharacterLastName()
    {
        return $this->characterLastName;
    }

    /**
     * @return string
     */
    public function getCharacterRace()
    {
        return $this->characterRace;
    }

    //Character sub races are about to be re-purposed, becoming character back stories. This will influence this parameter.
    /**
     * @return string
     */
    public function getCharacterSubRace()
    {
        return $this->characterSubRace;
    }

    /**
     * @return Gender|string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return string
     */
    public function getCharacterClass()
    {
        return $this->characterClass;
    }
}