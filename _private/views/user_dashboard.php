
<?php $this->layout('layouts::layout');?>


<?php

if(isset($_GET['not'])) {
    $not = $_GET['not'];
}else{
    $not = "";
}
?>
<div class="hoofdtext">
<div class="text">
<h1>Welkom terug, <?php echo getLoggedInUsername()?></h1>
<?php

if($not !== ""){
    ?>
    <div class="alert success">
    <span class="closebtn">&times;</span>  
    <strong>Success!</strong> <br><?php echo $not;?>
  </div>
  <?php
}
?>



<script>
var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>