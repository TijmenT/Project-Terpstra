<html>
<?php $this->layout('layouts::layout');?>
<link rel="stylesheet" href="<?php echo site_url( '/css/style4.css' ) ?>" media="all">
<br>
<br>
<br>

<div id="login-box">
  <div class="left">
  
    <h1>Klant Registeren</h1>
    <form action ="/klant/verwerken" method="POST">
    <input type="text" name="name" placeholder="Naam" />
    <input type="text" name="location" placeholder="Woonplaats" />
    <input type="submit" name="klant_submit" value="Maken" />
    </form>
  </div>
</div>
</html>