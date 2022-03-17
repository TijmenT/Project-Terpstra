<html>
<?php $this->layout('layouts::layout');?>
<link rel="stylesheet" href="<?php echo site_url( '/css/style3.css' ) ?>" media="all">
<br>
<br>
<br>

<div id="login-box">
  <div class="left">
  
    <h1>Gebruiker Registeren</h1>
    <form action ="/register/verwerken" method="POST">
    <input type="text" name="username" placeholder="Gebruikersnaam" />
    <input type="password" name="password" placeholder="Wachtwoord" />
    <input type="password" name="password2" placeholder="Herhaal wachtwoord" />
    <input type="checkbox" name="beheerder" value="Yes">
    <label for="beheerder">Beheerder</label><br>
    <input type="submit" name="signup_submit" value="Maken" />
    </form>
  </div>
</div>
</html>