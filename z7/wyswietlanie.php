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
$nazwaarray= array();
$xarrayprint = array();
$yarrayprint = array();
$result = mysqli_query($link, "Select nazwa, X_srodka, Y_srodka FROM srodek") or die ("DB error: $dbname");
$idr = array();
while ($row = mysqli_fetch_array ($result))
{
$nazwa = $row[0];
$x = $row[1];
$y = $row[2];
array_push($nazwaarray,$nazwa);
array_push($xarray,$x);
array_push($yarray,$y);
}
$xArraySuffix = array_map(function($x){ return $x . 'px'; }, $xarray);
$yArraySuffix = array_map(function($x){ return $x . 'px'; }, $yarray);

for ($i = 0; $i < count($nazwaarray); $i++) {
if($nazwaarray[$i] =="Krzeslo"){$nazwaarray[$i] = "krzeslo.png"; }
elseif ($nazwaarray[$i] == "Telewizor"){$nazwaarray[$i] = "telewizor.png"; }
elseif ($nazwaarray[$i] == "Lawka"){$nazwaarray[$i] = "lawka.png"; }
elseif ($nazwaarray[$i] == "Krzew"){$nazwaarray[$i] = "krzew.png"; }
elseif ($nazwaarray[$i] == "Komputer"){$nazwaarray[$i] = "komputer.png"; }


}
print "<br>";

?>

<html>
    <head>
    
    <meta name="viewport"> 
</head>
   <body>
   <div id="tlo">
   
    <img id="img" src="<?php echo $nazwaarray[0]; ?>" style="position: absolute; width:50px; height:50px; left:<?php echo $xArraySuffix[0]; ?>; bottom:<?php echo $yArraySuffix[0]; ?>"/>
    <img id="img1" src="<?php echo $nazwaarray[1]; ?>" style="position: absolute; width:50px; height:50px; left:<?php echo $xArraySuffix[1]; ?>; bottom:<?php echo $yArraySuffix[1]; ?>"/>
    <img id="img2" src="<?php echo $nazwaarray[2]; ?>" style="position: absolute; width:50px; height:50px; left:<?php echo $xArraySuffix[2]; ?>; bottom:<?php echo $yArraySuffix[2]; ?>"/>
    <img id="img3" src="<?php echo $nazwaarray[3]; ?>" style="position: absolute; width:50px; height:50px; left:<?php echo $xArraySuffix[3]; ?>; bottom:<?php echo $yArraySuffix[3]; ?>"/>
    <img id="img4" src="<?php echo $nazwaarray[4]; ?>" style="position: absolute; width:50px; height:50px; left:<?php echo $xArraySuffix[4]; ?>; bottom:<?php echo $yArraySuffix[4]; ?>"/>
    <img id="img5" src="<?php echo $nazwaarray[5]; ?>" style="position: absolute; width:50px; height:50px; left:<?php echo $xArraySuffix[5]; ?>; bottom:<?php echo $yArraySuffix[5]; ?>"/>
    <img id="img6" src="<?php echo $nazwaarray[6]; ?>" style="position: absolute; width:50px; height:50px; left:<?php echo $xArraySuffix[6]; ?>; bottom:<?php echo $yArraySuffix[6]; ?>"/>
    <img id="img7" src="<?php echo $nazwaarray[7]; ?>" style="position: absolute; width:50px; height:50px; left:<?php echo $xArraySuffix[7]; ?>; bottom:<?php echo $yArraySuffix[7]; ?>"/>
    <img id="img8" src="<?php echo $nazwaarray[8]; ?>" style="position: absolute; width:50px; height:50px; left:<?php echo $xArraySuffix[8]; ?>; bottom:<?php echo $yArraySuffix[8]; ?>"/>
</div>
<style>
           #tlo{
position:relative;
    white-space: nowrap;
    overflow: hidden; 
            background-image: url(plan1.png);
            background-repeat: no-repeat;
            
      width:700px;
      height:400px;
           }
           </style>
     
   </body>
</html>