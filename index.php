<?php
/**
 * Created by PhpStorm.
 * User: Joost
 * Date: 1-11-2016
 * Time: 20:10
 */

use domain\CharacterInformation;
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



$characterInformationApi = UrealmsApiFactory::getCharacterInformationApi();
$Information = $characterInformationApi->getInformationFor('Elf');

/** @var CharacterInformation $characterInformation */
foreach ($Information as $characterInformation) {
    echo 'Character: ' . '<br>'
        . $characterInformation->getCharacterName() . ' ' . $characterInformation->getCharacterLastName() . '<br>'
        . $characterInformation->getCharacterGender() . '<br><br>'
        . 'Sub Race: ' . '<br>'
        . $characterInformation->getCharacterSubRace() . '<br>'
        . $characterInformation->getCharacterClass() . '<br><br>'
    ;
}