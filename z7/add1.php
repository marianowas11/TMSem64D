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
$user = htmlentities ($_POST['user'], ENT_QUOTES, "UTF-8"); 
$pass = htmlentities ($_POST['pass'], ENT_QUOTES, "UTF-8"); 
$passagain = htmlentities ($_POST['passagain'], ENT_QUOTES, "UTF-8");
$x = htmlentities ($_POST['x'], ENT_QUOTES, "UTF-8"); 
$y = htmlentities ($_POST['y'], ENT_QUOTES, "UTF-8"); 
$stan = htmlentities ($_POST['stan'], ENT_QUOTES, "UTF-8"); 
if($passagain != $pass){
    header("Location: https://marianowas11.beep.pl/z7/errorhaslopowtorz.php");
    die('Passwords do not match');
}
$target_file = basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}




if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
 { 
     echo htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " uploaded."; 
}
else {
     echo "Error uploading file.";
     }




 $link = mysqli_connect( $dbhost, $dbuser, $dbpassword, $dbname); // połączenie z BD – wpisać swoje dane
 if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
 mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków
 $sql_u = "SELECT * FROM pracownik WHERE username='$user'";
 $res_u = mysqli_query($link, $sql_u);
 if (mysqli_num_rows($res_u) > 0) {
    header("Location: https://marianowas11.beep.pl/z7/errorloginzajety.php");
    die('Login already exists');}

$sql = "INSERT INTO pracownik (idp,username, haslo, stan, X_pracownika, Y_pracownika, nazwa_pliku) VALUES (NULL,'$user','$pass','$stan','$x','$y','$target_file');";
$link->query($sql);

    header("Location: https://marianowas11.beep.pl/z7/index3.php");
 mysqli_close($link); // zamknięcie połączenia z BD


?>
