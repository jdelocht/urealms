<?php
namespace domain;

/**
 * @since 1.0
 * @author Echodes / Joost de Locht
 */
class Gender
{
    private $gender;

    /**
     * Gender constructor.
     * @param $gender
     */
    public function __construct($gender)
    {
        $this->gender = $gender;
        $this->assertThatGenderIsMaleOrFemale();
    }

    /**
     * @param $gender
     * @throws GenderMustBeMaleOrFemale
     */
    public function assertThatGenderIsMaleOrFemale()
    {
        if($this->gender != 'Male' && $this->gender != 'Female') {
            throw new GenderMustBeMaleOrFemale();
        }
    }

    public function getGender()
    {
        return $this->gender;
    }
}