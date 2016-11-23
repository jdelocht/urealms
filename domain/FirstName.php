<?php
namespace domain;

/**
 * @since 1.0
 * @author Echodes / Joost de Locht
 */
class FirstName
{
    private $firstName;

    /**
     * FirstName constructor.
     * @param $firstName
     */
    public function __construct($firstName)
    {
        $this->firstName = $firstName;
    }
}