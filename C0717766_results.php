<style type="text/css">
.container{
  position: absolute;
  top: 50%;
  left: 15%;
  margin: -100px 0 0 -150px;
  font-size: 24px;
}
</style>
<?php session_start();

$deposit = $_SESSION['deposit'];
$interest_rate = $_SESSION['interest_rate'];
$years = $_SESSION['years'];

//calculate future value of your deposit..
$finalAmount = $deposit*(1 + $years*($interest_rate)/100);
echo "<div class='container'>Your Deposit Amount is <b>$".$deposit."</b> for the duration of <b>".$years."</b> years and applied interest is <b>". $interest_rate."</b>%,So your future value will be <b>$".$finalAmount."</b> <h2 align='center'><a href='C0717766_first.php'>Calculate again!</a></h2></div>";

?>
