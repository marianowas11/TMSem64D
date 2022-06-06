<?php declare(strict_types=1); // włączenie typowania zmiennych w PHP >=7
session_start(); // zapewnia dostęp do zmienny sesyjnych w danym pliku
if (isset($_SESSION['loggedin'])==false)
{
header('Location:https://marianowas11.beep.pl/z7/index3.php'); 
exit();
}
?>
<?php 

function fill_brand()  
 {  
    //ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
    $dbhost="mysql01.marianowas11.beep.pl"; $dbuser="tmsem64d"; $dbpassword="qwerty"; $dbname="tmsem64d";
    $connect = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);  
      $output = '';  
      $sql = "SELECT * FROM pracownik";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '<option value="'.$row["idp"].'">'.$row["username"].'</option>';  
      }  
      return $output;  
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
    Edytuj pracowników:  
    <form method="POST" action="pracownikEdytuj.php" enctype="multipart/form-data">
    <select name="pracownik" > <br>
    <option value="">Wybierz pracownika</option>  
    <?php echo fill_brand(); ?>  
    </select>   <br>
Stan:<select name="stan">
<option value=" "> Wybierz stan </option><option value="praca lokalna"> praca lokalna </option><option value="praca zdalna online"> praca zdalna online </option><option value="dyżur pod telefonem"> dyżur pod telefonem </option><option value="praca lokalna u klienta"> praca lokalna u klienta </option><option value="po pracy"> po pracy </option><option value="urlop"> urlop </option><option value="L4"> L4 </option>	
</select><br>
 X:<input type="range" name="x" id = "x" min = "0" max = "620" required  oninput="xOut.value =x.value"/>
 <output name="xOut" id="xOut">325</output><br>
 Y:<input type="range" name="y" id = "y" min = "0" max = "320" required oninput="yOut.value =y.value" />
 <output name="yOut" id="yOut">175</output><br>
 <input type="submit" value="Send"/>
</form>

<script>
    $(document).ready(function()
    {
        setInterval(function(){
            $("#autodata").load("wyswietlaniePracownicy.php");
        
        },1000);
    });
    $(document).ready(function()
    {
        setInterval(function(){
            $("#autodata1").load("tabelkaPracownicy.php");
          
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
