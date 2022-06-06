<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<BODY>
    <?php 
    session_start();
    ?>
Formularz rejestracji
<form method="POST" action="add1.php" enctype="multipart/form-data">
 Login:<input type="text" name="user" maxlength="20" size="20"><br>
 Hasło:<input type="password" name="pass" maxlength="20" size="20"><br>
 Powtórz hasło:<input type="password" name="passagain" maxlength="20" size="20"><br>
 Zdjęcie:  <input type="file" name="fileToUpload" id="fileToUpload"> <br>
 X:<input type="number" name="x" min = "0" required /><br>
 Y:<input type="number" name="y" min = "0" required /><br>
 Stan:<select name="stan">
	<option value=1> brak </option><option value=2> praca lokalna </option><option value=3> praca zdalna online </option><option value=4> dyżur pod telefonem </option><option value=5> praca lokalna u klienta </option><option value=6> po pracy </option><option value=7> urlop </option><option value=8> L4 </option>	
</select><br>
 <input type="submit" value="Send"/>
</form>
Użytkownik o wybranym loginie już istnieje
</BODY>
</HTML>