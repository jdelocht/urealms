<?php
namespace domain;

/**
 * @since 1.0
 * @author Echodes / Joost de Locht
 */
class Character
{
    /** @var Race */
    private $race;
    /** @var Gender */
    private $gender;
    /** @var Name */
    private $name;
    /** @var CharacterClass  */
    private $characterClass;

    /**
     * Character constructor.
     * @param Name $name
     * @param Race $id
     * @param Gender $gender
     * @param $characterClass
     */
    public function __construct(Name $name, Race $id, Gender $gender, CharacterClass $characterClass)
    {
        $this->name = $name;
        $this->gender = $gender;
        $this->race = $id;
        $this->characterClass = $characterClass;
    }

    /**
     * @return Name
     */
    public function getName()
    {
        return $this->name->getNameAsFormattedString();
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->name->getFirstName();
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->name->getLastName();
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
        return $this->characterClass->getClass();
    }
}