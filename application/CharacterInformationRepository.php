<?php
namespace application;
use domain\CharacterInformation;

/**
 * @since 1.0
 * @author Echodes / Joost de Locht
 */
interface CharacterInformationRepository
{
    public function getCharacterInformation($race);
    public function saveCharacter(CharacterInformation $character);
}