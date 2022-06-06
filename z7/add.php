
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<HEAD>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</HEAD>
<BODY>
<?php
include 'dbConn.php';
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$user = htmlentities ($_POST['user'], ENT_QUOTES, "UTF-8"); 
$pass = htmlentities ($_POST['pass'], ENT_QUOTES, "UTF-8"); 
$passagain = htmlentities ($_POST['passagain'], ENT_QUOTES, "UTF-8");
$fileToUpload = htmlentities ($_POST['fileToUpload'], ENT_QUOTES, "UTF-8"); 
$x = htmlentities ($_POST['x'], ENT_QUOTES, "UTF-8"); 
$y = htmlentities ($_POST['y'], ENT_QUOTES, "UTF-8"); 
$stan = htmlentities ($_POST['stan'], ENT_QUOTES, "UTF-8"); 
var_dump($user);
if($passagain != $pass){
    header("Location: https://marianowas11.beep.pl/z7/errorhaslopowtorz.php");
    die('Passwords do not match');
}
 $link = mysqli_connect( $dbhost, $dbuser, $dbpassword, $dbname); // połączenie z BD – wpisać swoje dane
 if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
 mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków
 $sql_u = "SELECT * FROM pracownik WHERE username='$user'";
 $res_u = mysqli_query($link, $sql_u);
 if (mysqli_num_rows($res_u) > 0) {
    header("Location: https://marianowas11.beep.pl/z7/errorloginzajety.php");
    die('Login already exists');}
 $result = mysqli_query($link, "SELECT * FROM pracownik WHERE (username='$user') and (haslo='$pass')"); // wiersza, w którym login=login z formularza
 $rekord = mysqli_fetch_array($result); // wiersza z BD, struktura zmiennej jak w BD
 mkdir($user);
    $sql = "INSERT INTO pracownik (idp,idpod, username, haslo, stan, X_pracownika, Y_pracownika) VALUES (NULL,NULL,'$user', '$pass','$stan','$x','$y')";
    $link->query($sql);

    header("Location: https://marianowas11.beep.pl/z7/index3.php");
 mysqli_close($link); // zamknięcie połączenia z BD


?>
</BODY>
</HTML>
