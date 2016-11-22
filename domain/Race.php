<?php
namespace domain;

/**
 * @since 1.0
 * @author Echodes / Joost de Locht
 */
class Race
{
    private $race;
    /**
     * @var SubRace
     */
    private $subrace;

    /**
     * Race constructor.
     * @param $race
     * @param SubRace $subRace
     */
    public function __construct($race, SubRace $subRace)
    {
        $this->race = $race;
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
     * @return mixed
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