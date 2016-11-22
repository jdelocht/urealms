<?php

use domain\Character;
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
?>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body class="main">
    <div class="top">
    <br><img src="http://live.urealms.com/img/logo.png" height="200px"></div>
    <h1>Character Creation</h1>

    <form action = "save.php" method = "post">
        <table class="table">
            <tr>
                <td width="1"><label for = "name">First Name: </label></td>
                <td><input type = "text" id = "name" name = "name" style = "width:300px"/><br></td>

            </tr>
            <tr>
                <td><label for = "last_name">Last Name: </label></td>
                <td><input type = "text" id = "last_name" name = "last_name" style = "width:300px"/><br></td>
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
                <td><input type = "text" id = "sub_race" name = "sub_race" style = "width:300px"/><br></td>
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
                <td><input type = "text" id = "class" name = "class" style = "width:300px"/><br></td>
            </tr>
            <tr>
                <td><br><input class = "button2" type = "submit" id = "submit" value = "Create your character!"/><br></td>
            </tr>
        </table>
    </form>
</body>
<br>
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
$race = array_key_exists('race', $_GET)
    ? $_GET['race']
    : '';

if (array_key_exists('race', $_GET)) {

    /**
     * @param $race
     * @return string
     */
    function getTitleForCharactersBasedOnTheir($race)
    {
        if ($race == 'Porc') {
            $title = 'The Porcs';
        } elseif ($race == 'Dwarf') {
            $title = 'The Dwarves';
        } elseif ($race == 'Gnome') {
            $title = 'The Gnomes';
        } elseif ($race == 'Goblin') {
            $title = 'The Goblins';
        } elseif ($race == 'Kobold') {
            $title = 'The Kobolds';
        } elseif ($race == 'Elf') {
            $title = 'The Elves';
        } else {
            $title = '';
        } return $title;
    }

    echo '<h2>' . getTitleForCharactersBasedOnTheir($race) . '</h2>';
    $information = $characterInformationApi->getInformationFor($race);

?>
    <div class="division3">
<?php

    /** @var Character $characterInformation */
    foreach ($information as $characterInformation) {

        echo '<div class="division4"><br>' . 'Name: ' . $characterInformation->getCharacterName() . ' ' . $characterInformation->getCharacterLastName() . '<br>' .
            'Gender: ' . $characterInformation->getGender() . '<br>' .
            'Sub Race: ' . $characterInformation->getSubRace() . '<br>' .
            'Class: ' . $characterInformation->getCharacterClass() . '<br><br>' . '</div>';
    }
}

?>
    </div>
</div>
<?php
