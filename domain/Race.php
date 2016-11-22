<?php
namespace domain;

/**
 * @since 1.0
 * @author Echodes / Joost de Locht
 */
class Race
{
    /**
     * @var $race
     */
    private $race;
    /**
     * @var SubRace
     */
    private $subrace;

    /**
     * Race constructor.
     * @param $name
     * @param SubRace $subRace
     */
    public function __construct($name, SubRace $subRace)
    {
        $this->race = $name;
        $this->subrace = $subRace;
        $this->assertThatRaceCantContainValueOtherThanGivenOptionsInForm();
    }

    public function assertThatRaceCantContainValueOtherThanGivenOptionsInForm()
    {
        if($this->race != 'Elf' && $this->race != 'Dwarf' && $this->race != 'Gnome' && $this->race != 'Kobold' && $this->race != 'Goblin' && $this->race != 'Porc') {
            throw new RaceMustContainValueGivenInForm();
        }
    }

    /**
     * @return string
     */
    public function getRace()
    {
        return $this->race;
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