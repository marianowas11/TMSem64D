<?php declare(strict_types=1); // włączenie typowania zmiennych w PHP >=7
session_start(); // zapewnia dostęp do zmienny sesyjnych w danym pliku
if (isset($_SESSION['loggedin'])==false)
{
    header('Location: https://marianowas11.beep.pl/z7/index3.php');
exit();
}
$time = date('H:i:s', time());
$user = $_SESSION ['usersession'];
$post = $_POST['post'];
$target_dir = $_SESSION ['usersession'];
$target_file = $target_dir . "/". basename($_FILES["fileToUpload"]["name"]);
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
 { echo htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " uploaded."; }
 else { echo "Error uploading file."; }



 $dbhost="mysql01.marianowas11.beep.pl"; $dbuser="tmsem64d"; $dbpassword="qwerty"; $dbname="tmsem64d";
  $connection = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
if (!$connection)
{
echo " MySQL Connection error." . PHP_EOL;
echo "Errno: " . mysqli_connect_errno() . PHP_EOL;
echo "Error: " . mysqli_connect_error() . PHP_EOL;
exit;
}
$result = mysqli_query($connection, "INSERT INTO messages (image, user) VALUES ('$target_file', '$user');") or die ("DB error: $dbname");
mysqli_close($connection);

header('Location: https://marianowas11.beep.pl/z7/index1.php');
?>
