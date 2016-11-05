<?php
/**
 * Created by PhpStorm.
 * User: Joost
 * Date: 1-11-2016
 * Time: 20:10
 */

//URL: http://localhost:4433/urealms/index.php?race=dwarf

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

$race = $_GET['race'];

$characterInformationApi = UrealmsApiFactory::getCharacterInformationApi();
$Information = $characterInformationApi->getInformationFor($race);
?>
<body>
<form action = "save.php" method = "post">
    <div>
        <label for = "name">First Name: </label>
        <input type = "text" id = "name" name = "name"/>
    </div>
    <div>
        <label for = "last_name">Last Name: </label>
        <input type = "text" id = "last_name" name = "last_name"/>
    </div>
    <div>
        <label for = "race">Race: </label>
        <input type = "text" id = "race" name = "race"/>
    </div>
    <div>
        <label for = "sub_race">Sub Race: </label>
        <input type = "text" id = "sub_race" name = "sub_race"/>
    </div>
    <div>
        <label for = "gender">Gender:<br></label>
        <input type = "radio" id = "gender" name = "gender" value = "Male" checked> Male<br>
        <input type = "radio" id = "gender" name = "gender" value = "Female"> Female<br>
    </div>
    <div>
        <label for = "class">Class: </label>
        <input type = "text" id = "class" name = "class"/>
    </div>
    <div class = "button">
        <input type = "submit" id = "submit" value = "Create your character!"/>
    </div>
</form>
</body>

<?php
echo $race . '<br><br>';
/** @var CharacterInformation $characterInformation */
foreach ($Information as $characterInformation) {
    echo $characterInformation->getCharacterName() . ' ' . $characterInformation->getCharacterLastName() . ' ' . $characterInformation->getCharacterGender() . ' ' . $characterInformation->getCharacterSubRace() . ' ' . $characterInformation->getCharacterClass() . '<br><br>';
}