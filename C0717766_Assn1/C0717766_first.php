<?php session_start();?>
<!DOCTYPE html>
<html>
<body>
  <link rel="stylesheet" href="style.css">

  <?php
//set default value of variables for initial page load
  $depositErr = $yearErr = $interestErr  = '';
  $deposit = $years = $interest_rate = '';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //validate deposit..
    if (empty($_POST["7766_deposit"])) {
      $depositErr = 'Deposit must be a valid number!';
    }
    else if($_POST["7766_deposit"] <= 0){
      $depositErr = 'Deposit must be greater than zero!';
    }else{
      $deposit = test_input($_POST["7766_deposit"]); 
    }

  //validate interest rate..
    if(empty($_POST["7766_interest_rate"])){
      $interestErr = 'Interest Rate must be a valid number!';
    }
    else if($_POST["7766_interest_rate"] <= 0){
      $interestErr = 'Interest Rate must be greater than zero!';
    }
    else{
      $interest_rate = test_input($_POST["7766_interest_rate"]); 
    }

  //validate number of years..
    if(empty($_POST["7766_years"])){
      $yearErr = 'Years must not be a fraction!';
    }//minimum requirement
    else if($_POST["7766_years"] <= 0){ 
      $yearErr = 'Years must be greater than zero!';
    }//maximum input allowed
    else if($_POST["7766_years"] > 35){ 
      $yearErr = 'Years must be less than 35!';
    }
    else{
      $years = test_input($_POST["7766_years"]); 
    }

    if($depositErr == "" && $interestErr == "" && $yearErr == "" ){

      $_SESSION['deposit'] = $_POST['7766_deposit'];
      $_SESSION['interest_rate'] = $_POST['7766_interest_rate'];
      $_SESSION['years'] = $_POST['7766_years'];
      header('Location:C0717766_results.php');
      exit(0);

    }

  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>
  <main>    
    <h3>Future Interest Calculator:</h3>

    <?php if (!empty($error_message)) { ?>
      <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
    <?php } ?>
    <div class="container">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <table>
          <tr>
            <td class="label"><label  for="deposit">Deposit Amount:</label></td>
            <td>
              <input type="text" id="deposit" name="7766_deposit" placeholder="Enter Amount.." value="<?php echo htmlspecialchars($deposit); ?>"><span class="error">* <?php echo $depositErr;?></span>
            </td>
          </tr>
          
          

          <tr>
            <td class="label"><label for="years">Number of Years:</label></td>
            <td><input type="text" id="years" name="7766_years" placeholder="Enter Years.." value="<?php echo htmlspecialchars($years); ?>">
              <span class="error">* <?php echo $yearErr;?></span></td>
            </tr>

            <tr>
              <td class="label"><label for="interest">Yearly Interest Rate:</label></td>
              <td><input type="text" id="interest" name="7766_interest_rate" placeholder="Enter Interest.." value="<?php echo htmlspecialchars($interest_rate); ?>">
                <span class="error">* <?php echo $interestErr;?></span></td>
              </tr>


              <tr>
                <td colspan="2" align="center"><input type="submit" value="Total Amount" class="btn border2 border222"></td>
              </tr>


            </form>
          </table>
        </div>
      </main>
    </body>
    </html>
    <?php

    ?>