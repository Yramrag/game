<html>
 <head>
     <title>Game</title>
 </head>
 <body>
 <h2>LOGIN</h2>
   <form action="index.php" method="post">
       <label>Your login <br /><input type="text" name="login" /></label><br />
       <label>Your password <br /><input type="password" name="password" /></label><br />
       <input type="hidden" name="enter" value="1">
       <input type="submit" value="GO!" />
   </form>
   <h2>REGISTER</h2>
   <form action="index.php" method="post">
       <label>Your login <br /><input type="text" name="login" /></label><br />
       <label>Your password <br /><input type="password" name="password" /></label><br />
       <input type="hidden" name="register" value="1">
       <input type="submit" value="REGISTER!" />
   </form>
 </body>
</html>