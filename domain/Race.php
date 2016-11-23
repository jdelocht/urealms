<?php
namespace domain;

/**
 * @since 1.0
 * @author Echodes / Joost de Locht
 */
class Race
{
    /** @var $id */
    private $id;
    /** @var SubRace */
    private $subrace;

       /**
     * Race constructor.
     * @param $id
     * @param $community
     * @param SubRace $subRace
     */
    public function __construct($id, SubRace $subRace)
    {
        $this->id = $id;
        $this->subrace = $subRace;
        $this->assertThatRaceCantContainValueOtherThanGivenOptionsInForm();
    }

    public function assertThatRaceCantContainValueOtherThanGivenOptionsInForm()
    {
        if($this->id != 'Elf' && $this->id != 'Dwarf' && $this->id != 'Gnome' && $this->id != 'Kobold' && $this->id != 'Goblin' && $this->id != 'Porc') {
            throw new RaceMustContainValueGivenInForm();
        }
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return SubRace
     */
    public function getSubRace()
    {
        return $this->subrace->getSubRace();
    }

    /**
     * @param $race
     * @return string
     */
    //doet nu nog niks
    public function getTitleForCharactersBasedOnTheir($race)
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