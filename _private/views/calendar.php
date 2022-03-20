
<?php $this->layout('layouts::layout');?>
<link rel="stylesheet" href="<?php echo site_url( '/css/calendar.css' ) ?>" media="all">
<div class="hoofdtext">
<div class="text">

<?php
 

 $calendar = new Calendar();

 echo $calendar;

