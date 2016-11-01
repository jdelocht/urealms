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
            self::createSessionRepository()
        );
    }

    public static function createSessionRepository()
    {
        $databaseConnection = 'mysql:dbname=gekkojdl;host=localhost';
        $databaseUser = 'joost';
        $password = 'jdltest';
        try {
            $link = new PDO($databaseConnection, $databaseUser, $password);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
        return new CharacterInformationPdoRepository($link);
    }
}