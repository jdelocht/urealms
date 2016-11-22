<?php
namespace application;
use domain\Character;

/**
 * @since 1.0
 * @author Echodes / Joost de Locht
 */
interface CharacterInformationRepository
{
    public function getCharacterInformation($race);
    public function saveCharacter(Character $character);
}