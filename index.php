<?php
/**
 * Created by PhpStorm.
 * User: Joost
 * Date: 1-11-2016
 * Time: 20:10
 */

require_once __DIR__ . '/domain/CharacterInformation.php';
require_once __DIR__ . '/application/CharacterInformationApi.php';
require_once __DIR__ . '/application/CharacterInformationRepository.php';
require_once __DIR__ . '/application/CharacterInformationPdoRepository.php';
require_once __DIR__ . '/interface/UrealmsApiFactory.php';

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