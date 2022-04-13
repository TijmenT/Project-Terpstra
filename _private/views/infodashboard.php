<html>
<?php $this->layout('layouts::layout');?>
<link rel="stylesheet" href="<?php echo site_url( '/css/style4.css' ) ?>" media="all">
<br>
<br>
<br>
<?php

if(isset($_GET['klant'])) {
    $klant = $_GET['klant'];
    $connection = dbConnect();
	$klantid = GetKlantById($klant);
    $sql = "SELECT * FROM `urenregistratie` WHERE `klantid` ='$klant'";
    $statement = $connection->query( $sql );
    $info = $statement->fetchAll();
    foreach($info as $k):
    echo "<h1>" . $k['aantaluren'] . "</h1>";
    endforeach;
}else{
    ?>
    <div id="login-box">
    <div class="left">
    
      <h1>Gegevens ophalen</h1>
      <form action ="/allinfo" method="GET">
      <label for="klant">Klant: </label>
      <select name="klant" id="klant" required>
      <option value="">Kies hier</option>
      <?php
      $connection = dbConnect();
      $sql = "SELECT * FROM `klanten`";
      $statement = $connection->query( $sql );
      $klanten = $statement->fetchAll();
      
      ?>
      <?php foreach($klanten as $k):?>
      <option value="<?php echo $k['id']?>"><?php echo $k['klant']?> | <?php echo $k['woonplaats']?></option>
      <?php endforeach;?>
      </select>
      <br>
      <br>
      <label for="workdate">Periode: </label>
      <select name="workdate" id="workdate" required>
      <option value="">Kies hier</option>
      <option value="week">Afgelopen Week</option>
      <option value="month">Afgelopen Maand</option>
      <option value="year">Afgelopen Jaar</option>
      </select>
      <br>
      <br>
  
      <input type="submit" name="klant_submit" value="Ophalen" />
      </form>
    </div>
  </div>
  <?php
}
?>

</html>