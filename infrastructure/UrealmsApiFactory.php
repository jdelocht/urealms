<?php
namespace infrastructure;

use application\CharacterInformationApi;
use application\CharacterInformationPdoRepository;
use PDO;
use PDOException;

/**
 * @since 1.0
 * @author Echodes / Joost de Locht
 */
class UrealmsApiFactory
{
    /**
     * @return CharacterInformationApi
     */
    public static function getCharacterInformationApi()
    {
        return new CharacterInformationApi(
            self::createSessionRepository()
        );
    }

    /**
     * @return CharacterInformationPdoRepository
     */
    public static function createSessionRepository()
    {
        $databaseConnection = 'mysql:dbname=;host=';
        $databaseUser = '';
        $password = '';
        try {
            $link = new PDO($databaseConnection, $databaseUser, $password);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
        return new CharacterInformationPdoRepository($link);
    }
}
