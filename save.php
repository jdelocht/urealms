<?php
/**
 * Created by PhpStorm.
 * User: Joost
 * Date: 5-11-2016
 * Time: 9:23
 */

use infrastructure\UrealmsApiFactory;

error_reporting(E_ALL);

spl_autoload_register(function ($class) {
    $file = __DIR__  . '/' . str_replace('\\', '/', $class) . '.php';

    if(file_exists($file)) {
        require_once $file;
        return;
    }
    echo $file . ' bestaat niet';
});

$character = new domain\CharacterInformation('Joost', 'de Locht', 'Dwarf', 'Hill Dwarf', 'Male', 'Ranger');
$characterInformationApi = UrealmsApiFactory::getCharacterInformationApi();
$characterInformationApi->saveCharacter($character);

