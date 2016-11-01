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

$character = '';

$characterInformationApi = UrealmsApiFactory::getCharacterInformationApi();
$Information = $characterInformationApi->getInformationFor($character);

/** @var CharacterInformation $characterInformation */
foreach ($Information as $characterInformation) {
    echo $characterInformation->getCharacterName();
}

echo 'Character Name: ' . '<br>'
    . 'Gwynneth(Name) ' . 'Sunsword(LastName) ' . '<br>'
    . 'Race: ' . '<br>'
    . 'Noble Born(subrace) ' . 'Elf(race) ' . '<br>'
    . 'Gender: ' . '<br>'
    . 'Female ' . '<br>'
    . 'Class: ' . '<br>'
    . 'Sun Cleric ' . '<br>';