<?php declare(strict_types=1); // włączenie typowania zmiennych w PHP >=7
session_start(); // zapewnia dostęp do zmienny sesyjnych w danym pliku
if (isset($_SESSION['loggedin'])==false)
{
header('Location:https://marianowas11.beep.pl/z7/index3.php'); 
exit();
}
?>
<html>
<!DOCTYPE html>
    <head><title>Jackowski</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
    <body>
    Witaj <?php echo $_SESSION ['usersession'] ?>!
    <a href ="index3.php">Wyloguj</a>
    <br>   <br>
    <a href ="/z7/index2.php">Wróć</a>  <br> <br>
    DODAWANIE ŚRODKA:
    <form method="POST" action="srodek.php" enctype="multipart/form-data">
 Typ środka:<select name="srodek">
	<option value="Krzeslo"> Krzeslo </option><option value="Telewizor"> Telewizor </option><option value="Komputer"> Komputer </option><option value="Lawka"> Lawka</option><option value="Krzew"> Krzew </option>
</select><br>
 ID:<input type="number" name="ID" min = "0" required /><br>
 Cena:<input type="number" name="cena" min = "0" required /><br>
 X:<input type="range" name="x" id = "x" min = "0" max = "650" required  oninput="xOut.value =x.value"/>
 <output name="xOut" id="xOut">325</output><br>
 Y:<input type="range" name="y" id = "y" min = "0" max = "350" required oninput="yOut.value =y.value" />
 <output name="yOut" id="yOut">175</output><br>
 UWAGA:<input type="text" name="uwaga" /><br>
 <input type="submit" value="Send"/>
</form>

<script>
    $(document).ready(function()
    {
        setInterval(function(){
            $("#autodata").load("wyswietlanie.php");
        
        },1000);
    });
    $(document).ready(function()
    {
        setInterval(function(){
            $("#autodata1").load("tabelka.php");
          
        },1000);
    });
</script>


<div class="container">
<div id="autodata"></div>
<div id="autodata1"></div>
</div>






<style>
    .container {
        display: grid;
        grid-template-columns: 800px 1000px; 
        grid-template-rows: 800px;
        grid-column-gap: 5px;
        left: 150px;
  
}
   
</style>


</body>
</html>
