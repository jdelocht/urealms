<?php
namespace domain;

/**
 * @since 1.0
 * @author Echodes / Joost de Locht
 */
class CharacterClass
{
    private $class;

    /**
     * CharacterClass constructor.
     * @param $class
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    public function assertThatClassIsNotAnEmptyString()
    {
        if(!is_string($this->class)) {
            throw new ClassMustBeValuedAsString();
        }
        if($this->class == '') {
            throw new ClassCantBeValuedAsAnEmptyString();
        }
    }

    public function getClass()
    {
        return $this->class;
    }
}