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
$nazwa_pliku_array = array();
$stanArray= array();
$result = mysqli_query($link, "Select username,stan, X_pracownika, Y_pracownika, nazwa_pliku FROM pracownik") or die ("DB error: $dbname");
$idr = array();
while ($row = mysqli_fetch_array ($result))
{
$nazwa = $row[0];
$stan = $row[1];
$x = $row[2];
$y = $row[3];
$nazwa_pliku = $row[4];
array_push($stanArray, $stan);
array_push($nazwa_pliku_array, $nazwa_pliku);
array_push($nazwaarray,$nazwa);
array_push($xarray,$x);
array_push($yarray,$y);
}
$xArraySuffix = array_map(function($x){ return $x . 'px'; }, $xarray);
$yArraySuffix = array_map(function($x){ return $x . 'px'; }, $yarray);

print "<br>";

for ($i = 0; $i < count($nazwaarray); $i++) {
    if($stanArray[$i] =="praca lokalna"){$stanArray[$i] = ""; }
    elseif ($stanArray[$i] == "praca zdalna online"){$stanArray[$i] = "blue"; }
    elseif ($stanArray[$i] == "dyżur pod telefonem"){$stanArray[$i] = "red"; }
    elseif ($stanArray[$i] == "praca lokalna u klienta"){$stanArray[$i] = "green"; }
    elseif ($stanArray[$i] == "po pracy"){$stanArray[$i] = "grey"; }
    elseif ($stanArray[$i] == "urlop"){$stanArray[$i] = "yellow"; }
    elseif ($stanArray[$i] == "L4"){$stanArray[$i] = "sepia"; }
    }
?>

<html>
    <head>
    
    <meta name="viewport"> 
</head>
   <body>
   <div id="tlo">
   
    <img id="img" class ="<?php echo $stanArray[0];?>" src="<?php echo $nazwa_pliku_array[0]; ?>" style="position: absolute; width:80px; height:80px; left:<?php echo $xArraySuffix[0]; ?>; bottom:<?php echo $yArraySuffix[0]; ?>"/>
    <img id="img1" class ="<?php echo $stanArray[1];?>" src="<?php echo $nazwa_pliku_array[1]; ?>" style="position: absolute; width:80px; height:80px; left:<?php echo $xArraySuffix[1]; ?>; bottom:<?php echo $yArraySuffix[1]; ?>"/>
   <img id="img2" class ="<?php echo $stanArray[2];?>" src="<?php echo $nazwa_pliku_array[2]; ?>" style="position: absolute; width:80px; height:80px; left:<?php echo $xArraySuffix[2]; ?>; bottom:<?php echo $yArraySuffix[2]; ?>"/>
   <img id="img3" class="<?php echo $stanArray[3]; ?>" src="<?php echo $nazwa_pliku_array[3]; ?>" style="position: absolute; width:80px; height:80px; left:<?php echo $xArraySuffix[3]; ?>; bottom:<?php echo $yArraySuffix[3]; ?>"/>
   <img id="img4" class="<?php echo $stanArray[4]; ?>" src="<?php echo $nazwa_pliku_array[4]; ?>" style="position: absolute; width:80px; height:80px; left:<?php echo $xArraySuffix[4]; ?>; bottom:<?php echo $yArraySuffix[4]; ?>"/>
   <img id="img5" class="<?php echo $stanArray[5]; ?>" src="<?php echo $nazwa_pliku_array[5]; ?>" style="position: absolute; width:80px; height:80px; left:<?php echo $xArraySuffix[5]; ?>; bottom:<?php echo $yArraySuffix[5]; ?>"/>
   <img id="img6" class="<?php echo $stanArray[6]; ?>" src="<?php echo $nazwa_pliku_array[6]; ?>" style="position: absolute; width:80px; height:80px; left:<?php echo $xArraySuffix[6]; ?>; bottom:<?php echo $yArraySuffix[6]; ?>"/>
   <img id="img7" class="<?php echo $stanArray[7]; ?>" src="<?php echo $nazwa_pliku_array[7]; ?>" style="position: absolute; width:80px; height:80px; left:<?php echo $xArraySuffix[7]; ?>; bottom:<?php echo $yArraySuffix[7]; ?>"/>
   <img id="img8" class="<?php echo $stanArray[8]; ?>" src="<?php echo $nazwa_pliku_array[8]; ?>" style="position: absolute; width:80px; height:80px; left:<?php echo $xArraySuffix[8]; ?>; bottom:<?php echo $yArraySuffix[8]; ?>"/>
   
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
        
    .blue{
        outline: 50px solid rgba(0, 0, 255, 0.5) !important;
    outline-offset: -80px;
    overflow: hidden;
    position: relative;
    height: 50px;
    width: 50px;
    }
    .blue.after{
        content:url("janusz.png");
         
        height: 10px;
        width: 10px;
    }


           .red {
    outline: 50px solid rgba(255, 0, 0, 0.5) !important;
    outline-offset: -80px;
    overflow: hidden;
    position: relative;
    height: 50px;
    width: 50px;
}

    .green {
    outline: 50px solid rgba(0, 255, 0, 0.5) !important;
    outline-offset: -80px;
    overflow: hidden;
    position: relative;
    height: 50px;
    width: 50px;
}
.yellow {
    outline: 50px solid rgba(255, 255, 0, 0.5) !important;
    outline-offset: -80px;
    overflow: hidden;
    position: relative;
    height: 50px;
    width: 50px;
}
.grey {
    filter: grayscale(100%);
}
.sepia{
    filter: sepia(100%);
}

           </style>
     
   </body>
</html>