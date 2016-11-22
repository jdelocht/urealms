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
    /** @var $community*/
    private $community;
    /** @var SubRace */
    private $subrace;

    /**
     * @return Race
     */
    private static function elf()
    {
        return new self('Elf', 'The Elves', new SubRace($subrace));
    }

    /**
     * @return Race
     */
    private static function dwarf()
    {
        return new self('Dwarf', 'The Dwarves', new SubRace($subrace));
    }

    /**
     * @return Race
     */
    private static function gnome()
    {
        return new self('Gnome', 'The Gnomes', new SubRace($subrace);
    }

    /**
     * @return Race
     */
    private static function goblin()
    {
        return new self('Goblin', 'The Goblins', new SubRace($subrace));
    }

    /**
     * @return Race
     */
    private static function kobold()
    {
        return new self('Kobold', 'The Kobolds', new SubRace($subrace));
    }

    /**
     * @return Race
     */
    private static function porc()
    {
        return new self('Porc', 'The Porcs', new SubRace($subrace));
    }

    /**
     * @param $id
     * @return Race
     */
    public static function create($id)
    {
        switch($id){
            case 'Elf':
                return Race::elf();
            case 'Dwarf':
                return Race::dwarf();
            case 'Gnome':
                return Race::gnome();
            case 'Goblin':
                return Race::goblin();
            case 'Kobold':
                return Race::kobold();
            case 'Porc':
                return Race::porc();
        } return $id;
    }

    /**
     * Race constructor.
     * @param $id
     * @param $community
     * @param SubRace $subRace
     */
    private function __construct($id, $community, SubRace $subRace)
    {
        $this->id = $id;
        $this->subrace = $subRace;
        $this->assertThatRaceCantContainValueOtherThanGivenOptionsInForm();
        $this->community = $community;
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