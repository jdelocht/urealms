<?php

use domain\CharacterInformation;
use infrastructure\UrealmsApiFactory;

//URL: http://localhost:4433/urealms/index.php?race=dwarf
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
$race = isset($_GET['race']) ? $_GET['race'] : 1;
$Information = $characterInformationApi->getInformationFor($race);
?>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body class="main">
    <img src="http://live.urealms.com/img/logo.png" height="200px"><br>
    <h1>Character Creation</h1>

    <form action = "save.php" method = "post">
        <table class="table">
            <tr>
                <td><label for = "name">First Name: </label></td>
                <td><input type = "text" id = "name" name = "name"/><br></td>

            </tr>
            <tr>
                <td><label for = "last_name">Last Name: </label></td>
                <td><input type = "text" id = "last_name" name = "last_name"/><br></td>
            </tr>
            <tr>
                <td><label for = "race">Race: </label></td>
                <td>
                    <input type = "radio" id = "race" name = "race" value = "Elf" checked> Elf
                    <input type = "radio" id = "race" name = "race" value = "Dwarf"> Dwarf
                    <input type = "radio" id = "race" name = "race" value = "Gnome"> Gnome
                    <input type = "radio" id = "race" name = "race" value = "Kobold"> Kobold
                    <input type = "radio" id = "race" name = "race" value = "Goblin"> Goblin
                    <input type = "radio" id = "race" name = "race" value = "Porc"> Porc <br>
                </td>
            </tr>
            <tr>
                <td><label for = "sub_race">Sub Race: </label></td>
                <td><input type = "text" id = "sub_race" name = "sub_race"/><br></td>
            </tr>
            <tr>
                <td><label for = "gender">Gender:<br></label>
                <td>
                    <input type = "radio" id = "gender" name = "gender" value = "Male" checked> Male
                    <input type = "radio" id = "gender" name = "gender" value = "Female"> Female <br>
                </td>
            </tr>
            <tr>
                <td><label for = "class">Class: </label></td>
                <td><input type = "text" id = "class" name = "class"/><br></td>
            </tr>
            <tr>
                <td><input class = "button2" type = "submit" id = "submit" value = "Create your character!"/><br></td>
            </tr>
        </table>
    </form>
</body>

<div class = "division">
    <a href = "http://localhost:4433/urealms/index.php?race=Elf" class = "button">The Elves</a>
    <a href = "http://localhost:4433/urealms/index.php?race=Dwarf" class = "button">The Dwarves</a>
    <a href = "http://localhost:4433/urealms/index.php?race=Gnome" class = "button">The Gnomes</a>
    <a href = "http://localhost:4433/urealms/index.php?race=Kobold" class = "button">The Kobolds</a>
    <a href = "http://localhost:4433/urealms/index.php?race=Goblin" class = "button">The Goblins</a>
    <a href = "http://localhost:4433/urealms/index.php?race=Porc" class = "button">The Porcs</a>
</div>

<div class = "division2">

<?php

function getCharacterRaceForTitle($race)
{
    if ($race == 'Porc') {
        $raceName = 'The Porcs';
    } elseif ($race == 'Dwarf') {
        $raceName = 'The Dwarves';
    } elseif ($race == 'Gnome') {
        $raceName = 'The Gnomes';
    } elseif ($race == 'Goblin') {
        $raceName = 'The Goblins';
    } elseif ($race == 'Kobold') {
        $raceName = 'The Kobolds';
    } elseif ($race == 'Elf') {
        $raceName = 'The Elves';
    } else $raceName = '';
        return $raceName;
}

echo '<h2>' . getCharacterRaceForTitle($race) . '</h2>';

?>
    <div class="division3">
<?php
/** @var CharacterInformation $characterInformation */
foreach ($Information as $characterInformation) {
    echo '<div class="division4"><br>' . 'Name: ' . $characterInformation->getCharacterName() . ' ' . $characterInformation->getCharacterLastName() . '<br>' .
        'Gender: ' . $characterInformation->getCharacterGender() . '<br>' .
        'Sub Race: ' . $characterInformation->getCharacterSubRace() . '<br>' .
        'Class: ' . $characterInformation->getCharacterClass() . '<br><br>' . '</div>';
}

?>
    </div>
</div>
<?php
