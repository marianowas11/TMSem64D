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
$link = mysqli_connect( $dbhost, $dbuser, $dbpassword, $dbname); // połączenie z BD – wpisać swoje dane
if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
$xarray = array();
$yarray = array();
$result = mysqli_query($link, "Select * FROM srodek") or die ("DB error: $dbname");
$i = 0;
$idr = array();
print "Środki Trwałe:<br><table><tr>
<th>Nazwa</th>
<th>ID</th>
<th>Koszt</th>
<th>Czas dodania</th>
<th>X</th>
<th>Y</th>
<th>Uwagi</th>
</tr>";
while ($row = mysqli_fetch_array ($result))
{
$ids = $row[0];
$nazwa = $row[1];
$identyfikator = $row[2];
$koszt = $row[3];
$datatime = $row[4];
$X_srodka = $row[5];
$Y_srodka = $row[6];
$uwagi = $row[7];

print "<tr><td>$nazwa</td> <td>$identyfikator</td> <td>$koszt</td>  <td>$datatime</td> <td>$X_srodka</td> <td>$Y_srodka</td>  <td>$uwagi</td> </tr>";
}
print "</table>";
?>
<style>
table, th, td {
  border: 1px solid white;
  border-collapse: collapse;
}
th, td {
  background-color: #96D4D4;
}
    </style>

