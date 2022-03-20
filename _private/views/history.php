
<?php $this->layout('layouts::layout');?>
<div class="hoofdtext">

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
<center><a href="?date=<?php $date = strtotime($date); echo $prevday = date('d-m-Y', strtotime("-1 day", $date));?>" id="optionsbutton" >←</a><p1>    <?php echo $timeDate?>     </p1><a href="?date=<?php $timeDate = strtotime($timeDate); echo $nextday = date('d-m-Y', strtotime("+1 day", $timeDate));?>" id="optionsbutton" >→</a></center>
</div>
<br>
<div class="text">
</div>
<br>
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
    if($strtime == $k['date']){
        $packages += 1
    ?>
    <center><div class="historyitem">
    <p1>Klant: <?php echo GetKlantById($k['klantid'])['klant']?> | <?php echo GetKlantById($k['klantid'])['woonplaats'] ?><br>Datum: <?php echo $k['date']?> <br>Time: <?php echo $k['time']?><br>Aantal Uren: <?php echo $k['aantaluren']?></p1></center>
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