<html>
<?php $this->layout('layouts::layout');?>
<link rel="stylesheet" href="<?php echo site_url( '/css/style4.css' ) ?>" media="all">
<br>
<br>
<br>

<div id="item-box">
  <div class="left">
  
    <center><h1>Uren Registratie</h1></center>
    <form action ="/item/verwerken" method="POST">
    <br>
    <label for="klant">Klant: </label>
    <select name="klant" id="klant">
    <option value="invalid">Kies hier</option>
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
    <label for="aantaluren">Uren: </label>
    <select name="aantaluren" id="urenveld">
    <option value="invalid">Kies hier</option>
    <option value="0,5">0,5</option>
    <option value="1">1,0</option>
    <option value="1,5">1,5</option>
    <option value="2">2,0</option>
    <option value="2">2,5</option>
    <option value="3">3,0</option>
    <option value="3,5">3,5</option>
    <option value="4">4,0</option>
    <option value="4,5">4,5</option>
    <option value="5">5,0</option>
    <option value="5,5">5,5</option>
    <option value="6">6,0</option>
    <option value="6,5">6,5</option>
    <option value="7">7,0</option>
    <option value="7,5">7,5</option>
    <option value="8">8,0</option>
    <option value="8,5">8,5</option>
    <option value="9">9,0</option>
    <option value="9,5">9,5</option>
    <option value="10">10,0</option>

    </select>
    <br>
    <br>

    <label for="workdate">Datum: </label>
    <select name="workdate" id="workdate">
    <option value="<?php echo $datemain = date('d-m-Y')?>"><?php echo $datemain = date('d-m-Y')?></option>
    <option value="<?php $date = strtotime($datemain); echo date('d-m-Y', strtotime("-1 day", $date));?>"><?php $date = strtotime($datemain); echo date('d-m-Y', strtotime("-1 day", $date));?></option>
    <option value="<?php $date = strtotime($datemain); echo date('d-m-Y', strtotime("-2 day", $date));?>"><?php $date = strtotime($datemain); echo date('d-m-Y', strtotime("-2 day", $date));?></option>
    <option value="<?php $date = strtotime($datemain); echo date('d-m-Y', strtotime("-3 day", $date));?>"><?php $date = strtotime($datemain); echo date('d-m-Y', strtotime("-3 day", $date));?></option>
    <option value="<?php $date = strtotime($datemain); echo date('d-m-Y', strtotime("-4 day", $date));?>"><?php $date = strtotime($datemain); echo date('d-m-Y', strtotime("-4 day", $date));?></option>
    <option value="<?php $date = strtotime($datemain); echo date('d-m-Y', strtotime("-5 day", $date));?>"><?php $date = strtotime($datemain); echo date('d-m-Y', strtotime("-5 day", $date));?></option>
    <option value="<?php $date = strtotime($datemain); echo date('d-m-Y', strtotime("-6 day", $date));?>"><?php $date = strtotime($datemain); echo date('d-m-Y', strtotime("-6 day", $date));?></option>
    </select>
    <br>
    <br>
    <label for="greenboost">Greenboost: </label>
    <input id="greenboost" type="number" name="greenboost" step="1">
    </select>
    <br>
    <br>
    <textarea name="extra" cols="30" rows="4" placeholder="Extra Info"></textarea>
    <br>
    <center><input type="submit" name="item_submit" value="Inleveren" /></center>
    </form>
  </div>
</div>
</html>

<!--$date = strtotime($date); echo $prevday = date('d-m-Y', strtotime("-1 day", $date));-->