<html>
<link rel="stylesheet" href="<?php echo site_url( '/css/style3.css' ) ?>" media="all">
<br>
<br>
<br>

<center><img src="../../images/alleenlogo.png"</center>
<div id="login-box">
  <div class="left">
  
    <h1>Inloggen</h1>
    <form action ="<?php echo url('login.handle')?>" method="POST">
    <input type="username" name="username" placeholder="Gebruikersnaam" />
    <input type="password" name="password" placeholder="Wachtwoord" />
    
    <input type="submit" name="signup_submit" value="Inloggen" />
    </form>
  </div>
</div>
</html>