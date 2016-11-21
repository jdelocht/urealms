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
    /** @var Race */
    private $race;
    /** @var string  */
    private $characterSubRace;
    /** @var string  */
    private $characterClass;
    /** @var Gender  */
    private $gender;

    /**
     * CharacterInformation constructor.
     * @param string $characterName
     * @param string $characterLastName
     * @param Race $race
     * @param string $characterSubRace
     * @param Gender $gender
     * @param string $characterClass
     */
    public function __construct($characterName, $characterLastName, Race $race, $characterSubRace, Gender $gender, $characterClass)
    {
        $this->characterName = $characterName;
        $this->characterLastName = $characterLastName;
        $this->characterSubRace = $characterSubRace;
        $this->characterClass = $characterClass;
        $this->gender = $gender;
        $this->race = $race;
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
        return $this->race->getRace();
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
        return $this->gender->getGender();
    }

    /**
     * @return string
     */
    public function getCharacterClass()
    {
        return $this->characterClass;
    }

    /**
     * @param $race
     * @return string
     */
    public function getCharacterRaceForTitle($race)
    {
        if ($race == 'Porc') {
            return 'The Porcs';
        }
        if ($race == 'Dwarf') {
            return 'The Dwarves';
        }
        if ($race == 'Gnome') {
            return 'The Gnomes';
        }
        if ($race == 'Goblin') {
            return 'The Goblins';
        }
        if ($race == 'Kobold') {
            return 'The Kobolds';
        }
        if ($race == 'Elf') {
            return 'The Elves';
        }
        return '';
    }
}