<?php
namespace domain;

/**
 * @since 1.0
 * @author Echodes / Joost de Locht
 */
class LastName
{
    private $lastName;

    /**
     * LastName constructor.
     * @param $lastName
     */
    public function __construct($lastName)
    {
        $this->lastName = $lastName;
    }

    public function assertThatLastNameIsString()
    {
        if(!is_string($this->lastName)) {
            throw new LastNameMustBeValuedAsString();
        }
        if($this->lastName == '') {
            throw new LastNameCantBeValuedAsAnEmptyString();
        }
    }

    public function getLastName()
    {
        return $this->lastName;
    }
}