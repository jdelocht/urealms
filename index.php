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

$race = $_GET['race'];

$characterInformationApi = UrealmsApiFactory::getCharacterInformationApi();
$Information = $characterInformationApi->getInformationFor($race);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
    </head>

    <body>
        <table width="400" border="0" align="center" cellpadding="3" cellspacing="0">
            <tr>
                <td><strong>Character Creation</strong></td>
            </tr>
        </table>
        <table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#dcdcdc">
            <tr>
                <form method = "post" action = "save.php">
                    <td>
                        <table width="400" border="0" cellpadding="3" cellspacing="1" bgcolor="#f0f8ff">
                            <tr>
                                <td width="117">Name</td>
                                <td width="14">:</td>
                                <td width="357"><input type = "text" name = "firstname" id = "name" size = "40"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><input type = "text" name = "Last Name"  id = "lastname" size = "40"></td>
                            </tr>
                            <tr>
                                <td valign="top">Comment</td>
                                <td valign="top">:</td>
                                <td><input type="text" name= "Sub Race" id="subrace" size="40"></td>
                            </tr>
                            <tr>
                                <td><input type="submit" name="Submit" value="Submit"/></td><td><input type="reset" name="Sumbit2" value="Reset"/></td>
                            </tr>
                        </table>
                    </td>
                </form>
            </tr>
        </table>
        <table width="400" border="0" align="center" cellpadding="3" cellspacing="0">
            <tr>
                <td>
<?php


echo $race . '<br><br>';
/** @var CharacterInformation $characterInformation */
foreach ($Information as $characterInformation) {
    echo $characterInformation->getCharacterName() . ' ' . $characterInformation->getCharacterLastName() . ' ' . $characterInformation->getCharacterGender() . ' ' . $characterInformation->getCharacterSubRace() . ' ' . $characterInformation->getCharacterClass() . '<br><br>'
    ;
}
?>
                </td>
            </tr>
        </table>
    </body>
</html>




