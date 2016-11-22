<?php
namespace domain;

/**
 * @since 1.0
 * @author Echodes / Joost de Locht
 */
class SubRace
{
    private $subRace;

    /**
     * Subrace constructor.
     * @param $subRace
     */
    public function __construct($subRace)
    {
        $this->subRace = $subRace;
    }

    /**
     * @return string $subRace
     */
    public function getSubRace()
    {
        return $this->subRace;
    }
}