
<?php $this->layout('layouts::layout');?>
<div class="hoofdtext">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php
if(isset($_GET['date'])) {
    $date = $_GET['date'];
    $timeDate = $date;
    $strtime = $date;

}else{
    $date = date('d-m-Y');
    $timeDate = $date;
    $strtime = $date;
}

?>

<br>
<div class="nextpage">
<br>
<br>
<center><a href="?date=<?php $date = strtotime($date); echo $prevday = date('d-m-Y', strtotime("-1 day", $date));?>" id="optionsbutton" >←</a><p1>    <?php if($timeDate == date("d-m-Y")){echo "Vandaag";}else{echo $timeDate; }?>     </p1><a href="?date=<?php $timeDate = strtotime($timeDate); echo $nextday = date('d-m-Y', strtotime("+1 day", $timeDate));?>" id="optionsbutton" >→</a></center>
</div>
<div class="text">
</div>
<?php
    $dbdate = strtotime($timeDate);
    $connection = dbConnect();
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM `urenregistratie` WHERE `userid`=$user_id";
    $statement = $connection->query( $sql );
    $mijnuren = $statement->fetchAll();
    $packages = 0
    ?>
    <?php
    foreach($mijnuren as $k):
    if($strtime == $k['workdate']){
        $packages += 1
    ?>

    <center><div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Klant: <?php echo GetKlantById($k['klantid'])['klant']?></h5>
  </div>
  <ul class="list-group list-group-flush">
  <li class="list-group-item">Plaats: <?php echo GetKlantById($k['klantid'])['woonplaats'] ?> </li>
    <li class="list-group-item">Datum: <?php echo $k['workdate']?></li>
    <li class="list-group-item">Aantal Uren: <?php echo $k['aantaluren']?></li>
    <li class="list-group-item">Opmerkingen: <br><?php echo $k['extra']?></li>
  </ul>
  <div class="card-body">
    <a href="item/verwijderen?itemid=<?php echo $k['id']?>" class="card-link" method="POST">Ongedaan maken</a>  
  </div>
</div></center>
        <br>
        <br>
    
    <?php }endforeach;
    if($packages == 0){
        ?>
        <center><p1 id="noinfo">Geen informatie gevonden!</p1></center>
        <?php
    }
    ?>
    </div>