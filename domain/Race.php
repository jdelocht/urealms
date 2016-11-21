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
     * Race constructor.
     * @param $race
     */
    public function __construct($race)
    {
        $this->race = $race;
        $this->assertThatRaceCantContainValueOtherThanGivenOptionsInForm();
    }

    public function assertThatRaceCantContainValueOtherThanGivenOptionsInForm()
    {
        if($this->race != 'Elf' && $this->race != 'Dwarf' && $this->race != 'Gnome' && $this->race != 'Kobold' && $this->race != 'Goblin' && $this->race != 'Porc') {
            throw new RaceMustContainValueGivenInForm();
        }
    }

    public function getRace()
    {
        return $this->race;
    }
}