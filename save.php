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

$characterName = $_POST['name'];
$characterLastName = $_POST['last_name'];
$characterRace = $_POST['race'];
$characterSubRace = $_POST['sub_race'];
$characterGender = $_POST['gender'];
$characterClass = $_POST['class'];

$character = new domain\CharacterInformation($characterName, $characterLastName, $characterRace, $characterSubRace, $characterGender, $characterClass);


$characterInformationApi = UrealmsApiFactory::getCharacterInformationApi();
$characterInformationApi->saveCharacter($character);


header('location: /urealms/index.php');

