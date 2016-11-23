<?php
namespace domain;

/**
 * @since 1.0
 * @author Echodes / Joost de Locht
 */
class LastName
{
    private $name;

    /**
     * LastName constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->assertThatLastNameIsNotAnEmptyString();
    }

    /**
     * @throws LastNameCantBeValuedAsAnEmptyString
     * @throws LastNameMustBeValuedAsString
     */
    public function assertThatLastNameIsNotAnEmptyString()
    {
        if(!is_string($this->name)) {
            throw new LastNameMustBeValuedAsString();
        }
        if($this->name == '') {
            throw new LastNameCantBeValuedAsAnEmptyString();
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}