<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<BODY>
    <?php 
    session_start();
    ?>
Formularz logowania
<form method="post" action="weryfikuj3.php">
 Login:<input type="text" name="user" maxlength="20" size="20"><br>
 Hasło:<input type="password" name="pass" maxlength="20" size="20"><br>
 <input type="submit" value="Send"/>
</form>
<a href ="rejestruj.php">Lub załóż konto </a><br />
</BODY>
</HTML>