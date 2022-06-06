<?php declare(strict_types=1); // włączenie typowania zmiennych w PHP >=7
session_start(); // zapewnia dostęp do zmienny sesyjnych w danym pliku
if (isset($_SESSION['loggedin'])==false)
{
    header('Location: https://marianowas11.beep.pl/z7/index3.php');
exit();
}
?>
<!DOCTYPE html>
<html>
<body>
<form action="upload.php" method="post" enctype="multipart/form-data">
 Select file to upload:
 <input type="file" name="fileToUpload" id="fileToUpload">
 <input type="submit" value="Upload" name="submit">
</form>
</body>
</html>
