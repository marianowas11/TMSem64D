<?php declare(strict_types=1); // włączenie typowania zmiennych w PHP >=7
session_start(); // zapewnia dostęp do zmienny sesyjnych w danym pliku
if (isset($_SESSION['loggedin'])==false)
{
    header('Location: https://marianowas11.beep.pl/z7/index3.php');
exit();
}
include 'dbConn.php';
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$pracownik = htmlentities ($_POST['pracownik'], ENT_QUOTES, "UTF-8"); 
$stan = htmlentities ($_POST['stan'], ENT_QUOTES, "UTF-8");  
$x = htmlentities ($_POST['x'], ENT_QUOTES, "UTF-8"); 
$y = htmlentities ($_POST['y'], ENT_QUOTES, "UTF-8"); 

$link = mysqli_connect( $dbhost, $dbuser, $dbpassword, $dbname); // połączenie z BD – wpisać swoje dane
 if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
 mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków
 
$sql = "UPDATE pracownik SET stan = '$stan', X_pracownika = '$x', Y_pracownika = '$y' WHERE idp ='$pracownik'";
$link->query($sql);

header("Location: https://marianowas11.beep.pl/z7/pracownicy.php");
 mysqli_close($link); // zamknięcie połączenia z BD


?>