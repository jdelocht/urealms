<?php

/**
 * @since 1.0
 * @author Echodes / Joost de Locht
 */
class UrealmsApiFactory
{
    public static function getCharacterInformationApi()
    {
        return new CharacterInformationApi(
            new CharacterInformationPdoRepository()
        );
    }
}