<?php
namespace domain;

/**
 * @since 1.0
 * @author Echodes / Joost de Locht
 */
class Character
{
    /** @var string */
    private $characterName;
    /** @var string  */
    private $characterLastName;
    /** @var Race */
    private $race;
    /** @var string  */
    private $characterClass;
    /** @var Gender  */
    private $gender;

    /**
     * CharacterInformation constructor.
     * @param string $characterName
     * @param string $characterLastName
     * @param Race $id
     * @param string $characterSubRace
     * @param Gender $gender
     * @param string $characterClass
     */
    public function __construct(Name $name, $characterName, $characterLastName, Race $id, Gender $gender, $characterClass)
    {
        $this->characterName = $characterName;
        $this->characterLastName = $characterLastName;
        $this->characterClass = $characterClass;
        $this->gender = $gender;
        $this->race = $id;
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
    public function getRace()
    {
        return $this->race->getId();
    }

    //Character sub races are about to be re-purposed, becoming character back stories. This will influence this parameter.
    /**
     * @return string
     */
    public function getSubRace()
    {
        return $this->race->getSubRace();
    }

    /**
     * @return Gender|string
     */
    public function getGender()
    {
        return $this->gender->getGender();
    }

    /**
     * @return string
     */
    public function getCharacterClass()
    {
        return $this->characterClass;
    }
}