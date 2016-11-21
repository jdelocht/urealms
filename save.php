<?php
/**
 * Created by PhpStorm.
 * User: Joost
 * Date: 5-11-2016
 * Time: 9:23
 */

use domain\CharacterInformation;
use domain\Gender;
use domain\Race;
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

try {
$character = new CharacterInformation($characterName, $characterLastName, new Race($characterRace), $characterSubRace, new Gender($characterGender), $characterClass);
} catch (Exception $e) {
    echo 'One or more of the given values are not allowed';
    header('location: /urealms/index.php');
    exit;
}

$characterInformationApi = UrealmsApiFactory::getCharacterInformationApi();
$characterInformationApi->saveCharacter($character);


header('location: /urealms/index.php');

