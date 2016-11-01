<?php
namespace application;
/**
 * @since 1.0
 * @author Echodes / Joost de Locht
 */
interface CharacterInformationRepository
{
    public function getCharacterInformation($race);
}