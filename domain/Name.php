<?php
namespace domain;

/**
 * @since 1.0
 * @author Echodes / Joost de Locht
 */
class Name
{
    /**
     * @var FirstName
     */
    private $firstName;
    /**
     * @var LastName
     */
    private $lastName;

    /**
     * Name constructor.
     * @param FirstName $firstName
     * @param LastName $lastName
     */
    public function __construct(FirstName $firstName, LastName $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getNameAsFormattedString()
    {
        return $this->firstName->getName() . ' ' . $this->lastName->getName();
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName->getName();
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName->getName();
    }

}