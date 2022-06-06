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
$result = mysqli_query($link, "Select * FROM pracownik") or die ("DB error: $dbname");
$i = 0;
$idr = array();
print "Pracownicy:<br><table><tr>
<th>Nazwa</th>
<th>Stan</th>
<th>X</th>
<th>Y</th>
</tr>";
while ($row = mysqli_fetch_array ($result))
{
$nazwa = $row[1];
$stan = $row[3];
$X = $row[4];
$Y = $row[5];

if($stan == "1"){$stan =" ";}
elseif($stan == "2"){$stan ="praca lokalna";}
elseif($stan == "3"){$stan ="praca zdalna online";}
elseif($stan == "4"){$stan ="dyżur pod telefonem";}
elseif($stan == "5"){$stan ="praca lokalna u klienta";}
elseif($stan == "6"){$stan ="po pracy";}
elseif($stan == "7"){$stan ="urlop";}
elseif($stan == "8"){$stan ="L4";}

print "<tr><td>$nazwa</td> <td>$stan</td> <td>$X</td>  <td>$Y</td></tr>";
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

