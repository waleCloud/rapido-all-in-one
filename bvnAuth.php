<?php

  require_once 'conf/DB.php';

  $acctName = $_SESSION['acctName'];
  $banks = '';

  if(isset($_POST['register']))
  {
    $username = $_SESSION['username'];
    $pin = $_SESSION['pin'];
    $init_bank = $_SESSION['initBankName'].', '.$_SESSION['initBankNum'];
    
    $c = $_POST['counter'];
    for($j=0; $j<$c; $j++) {
      $banks = $banks.' '.$_POST["randB$j"].', '.$_POST["randN$j"].', ';
    }
    $bvn = $_SESSION['bvn'];
    //print_r($banks);
    $sql = "INSERT INTO users (username, pin, init_bank, banks, bvn) VALUES ('$username',
    $pin, '$init_bank', '$banks', $bvn);";

    if($db->query($sql) ){
      echo "<script>window.location.href='index.php?pid=1&uenn373892500008268632DTGC7V7CTE7TA8C862ICGEVQCT2QIDT2O8DTGO2TQDO872GFTO872TD29F7T2OFTD6FCFFC2PFCU02309Y9d6dlEWQ'</script>";
    }else{
      die("Error Creating Account, Please try again ".$db->error);
    }


  }

?>

<!DOCTYPE html>
<html lang="en" ng-app="">
  <head>
    <meta charset="utf-8">
    <title>Rapido - All-in-one</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Loading Bootstrap -->
    <link href="css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="css/flat-ui.min.css" rel="stylesheet">

    <link rel="shortcut icon" href="img/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<div class="container">

<nav class="navbar navbar-default">
  <div class="">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
   </button>
      <a class="navbar-brand" href="#">Rapido</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">How it works</a></li>
        <li><a href="#">Rapido for business</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a data-toggle="collapse" href="#collapseSignUp" aria-expanded="false" aria-controls="collapseSignUp"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#" ><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="">
  <h4>ONE PLATFORM FOR ALL YOUR BANKING APPS</h4>

  <div class="col-md-3"></div>
  
  <div class="col-md-6 pagination-centered panel-collapse collapse in" id="collapseLogin">
  <div class="panel panel-default">
    <div class="panel-heading">Supply your BVN to link all acccounts</div>
    <form method="post" action="">
      <label>BVN: <small>use the following BVN(s) 222895432, 222154360, 222425097</small></label>
      <input type="number" oninput="verifyBvn()" id="bv_n" name="bvn" class="form-control" placeholder="222xxxxxx" required="true">
      <label></label>
      <div id="bvnBtn">
      </div>      
    </form>
  </div>
<div class="panel panel-default" id="details">
  <?php
  if(isset($_POST['bvnBtn'])) {
    echo "<form action='' method='post'><p>All Account Details for: <strong>$acctName</strong><br>
    Bank: <strong>".$_SESSION['initBankName']."</strong>
    Number: <strong>".$_SESSION['initBankNum']."</strong><br>";
    $counter = rand(0,2);
    //echo $counter;
      for($i=0; $i<$counter; $i++){
        $rand = ranDetails();
        //print_r($rand);
        $randBank = $rand["bank"];
        //print_r($randBank.$i);
        $randNum = $rand['num'];

        echo "
        Bank:<strong> $randBank</strong> 
        Number: <strong> $randNum</strong><br>
        </p>
        <input type='hidden' name='randB$i' value='$randBank'>
        <input type='hidden' name='randN$i' value='$randNum'>";
      }
      echo " click to continue <input type='hidden' name='counter' value='$i'><input type='submit' name='register' class='btn btn-primary' value='Continue'>
        </form>";
      $_SESSION['bvn'] = $_POST['bvn'];
  }
  ?>
</div>

      </div>
    </div>
  </div>

  <div class="col-md-3"></div>

</div>


    </div>
    <!-- /.container -->

    <script type="text/javascript">
      function OAuthBvn(){
        $acctName = document.getElementById('acctName').value;
        $bank = document.getElementById('bank').value;
        $num = document.getElementById('num').value; 

        document.getElementById('details').innerHTML = '<p>All Account Details for: <strong>'+acctName+'</strong><br>Bank: <strong>'+bank+'</strong> Number: <strong>'+num+'</strong><br>Bank: <strong>GT Bank</strong> Number: <strong>0986204321</strong><br></p>click to continue <a class="btn btn-primary" href="home.php">Continue</a>';
      }
      function verifyBvn(){
        var bvn = document.getElementById('bv_n').value;
        if(bvn === "222895432"){
          document.getElementById('bvnBtn').innerHTML = '<input type="submit" name="bvnBtn" class="btn form-control btn-success" value="Submit" onclick="OAuthBvn()">';
        }
        else if (bvn === "222154360"){
          document.getElementById('bvnBtn').innerHTML = '<input type="submit" name="bvnBtn" class="btn form-control btn-success" value="Submit" onclick="OAuthBvn()">';
        }
        else if(bvn === "222425097"){
          document.getElementById('bvnBtn').innerHTML = '<input type="submit" name="bvnBtn" class="btn form-control btn-success" value="Submit" onclick="OAuthBvn()">';
        }else{
          document.getElementById('bvnBtn').innerHTML = 'Bvn not valid';
        }
      }
    </script>

    <!-- Angular -->
    <script src="js/angular.min.js"></script>
    <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="js/vendor/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/vendor/video.js"></script>
    <script src="js/flat-ui.min.js"></script>

  </body>
</html>
