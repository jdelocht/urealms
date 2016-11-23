<?php
namespace domain;

/**
 * @since 1.0
 * @author Echodes / Joost de Locht
 */
class FirstName
{
    private $name;

    /**
     * FirstName constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->assertThatFirstNameIsNotAnEmptyString();
    }

    /**
     * @throws FirstNameCantBeValuedAsAnEmptyString
     * @throws FirstNameMustBeValuedAsString
     */
    public function assertThatFirstNameIsNotAnEmptyString()
    {
        if(!is_string($this->name)) {
            throw new FirstNameMustBeValuedAsString();
        }
        if($this->name == '') {
            throw new FirstNameCantBeValuedAsAnEmptyString();
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