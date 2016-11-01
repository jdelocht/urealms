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
$InformationTwo = $characterInformationApi->getInformationFor('Kobold');

echo 'The Elves<br><br>';
/** @var CharacterInformation $characterInformation */
foreach ($Information as $characterInformation) {
    echo $characterInformation->getCharacterName() . ' ' . $characterInformation->getCharacterLastName() . ' ' . $characterInformation->getCharacterGender() . ' ' . $characterInformation->getCharacterSubRace() . ' ' . $characterInformation->getCharacterClass() . '<br><br>'
    ;
}

echo 'The Kobolds<br><br>';
foreach ($InformationTwo as $characterInformation) {
    echo $characterInformation->getCharacterName() . ' ' . $characterInformation->getCharacterLastName() . ' ' . $characterInformation->getCharacterGender() . ' ' . $characterInformation->getCharacterSubRace() . ' ' . $characterInformation->getCharacterClass() . '<br><br>'
    ;
}