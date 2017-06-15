<?php
    require_once "conf/DB.php";

    $iniBank = $sess['ibank_name'];
    $iniBankNum = $sess['ibank_num'];

    $sp_banks = $sess['sp_banks'];

    $count = count($_SESSION['banks']);
    //print_r($count);

    if(isset($sess['send']))
    {

    }
?>

<!DOCTYPE html>
<html lang="en" ng-app="">
  <head>
    <meta charset="utf-8">
    <title>Rapido - Transfer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- Loading Bootstrap -->
    <link href="css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

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
      <button style="float: left;" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
     
   </button>
   <div class="collapse navbar-collapse navbar-left" id="myNavbar">
     <ul class="nav navbar-nav">
       <li><a href="home.php"><i class="fa fa-tachometer fa-2x"></i> Home</a></li>
       <li class="active"><a href="#"><i class="fa fa-exchange fa-2x"></i> Tranfers</a></li>
       <li><a href="bills.php"><i class="fa fa-money fa-2x"></i> Pay bills</a></li>
       <li><a href="airtime.php"><i class="fa fa-mobile fa-2x"></i> Buy Airtimes</a></li>
       <li><a href="stats.php"><i class="fa fa-bank fa-2x"></i> Transaction Statements</a></li>
       <li><a href="bal.php"><i class="fa fa-bar-chart fa-2x"></i> Balance</a></li>
     </ul>
   </div>
    </div>

  </div>
</nav>
<div class="">
  <h5>Transfers<small> </small></h5>

  <div class="col-md-2"></div>

  <div class="col-md-8 pagination-centered panel-collapse collapse in" id="collapseLogin">
  <div class="panel panel-default">
    <div class="panel-heading"></div>
    <div class="panel-body">

        <form method="post" action="">
            <select name="SelAcct" class="form-control">
                <option>Select Account to send from</option>

                <option value="<?= $iniBank.'['.$iniBankNum.']'; ?> "><?= $iniBank.'['.$iniBankNum.']'; ?></option>
                <?php 
                    
                    for($i=0; $i<$count; $i+=2) {
                        echo "<option value=".$sp_banks[$i].">".$sp_banks[$i]."</option>";
                    }
                ?>
                <option value="">Merge accounts[remove from all accounts evenly]</option>
            </select>
            <label for="">Amount: #</label>
            <input type="number" class="form-control">
            <label for="bank"><strong>Transfer to:</strong></label>
            <select name="bank" class="form-control">
                <option>Select Bank</option>
                <option value="Access Bank">Access Bank</option>
                <option value="First Bank">First Bank</option>
                <option value="GTB">GTB</option>
                <option value="UBA">UBA</option>
                <option value="Zenith Bank">Zenith Bank</option>
            </select>
            <label for="">Account Number:</label>
            <input type="number" class="form-control" id="acctNum" name="initBankNum" placeholder="" required="true" size="10" oninput="verifyAcct()" onchange="verifyAcct()">
            <label>&nbsp;</label>
            <div id="acctName">
            </div>
            <label for="pin">Rapido Pin: </label>
            <input type="number" name="pin" id="pin" class="">

            <input type="submit" name="send" class="form-control btn-success">
        </form>

  </div>

  </div>

  <div class="col-md-2"></div>

  </div>

    </div>
    <!-- /.container -->

        <script type="text/javascript">
      function verifyAcct(){
        var acct = document.getElementById('acctNum').value;
        var aName;
        if(acct) {
          switch (acct) {
          case '0219856428':
            aName = 'Tomisin Uche';
            break;
          case '2602564211':
            aName = 'Azeez Emeka';
            break;
          case '0060284639':
            aName = 'Nnamdi Toyin';
            break;
          case '0160284639':
            aName = 'Bisola Taiwo';
            break;
          case '0012872302':
            aName = 'Joseph Bassey';
            break;
          default:
            acct = false;
            aName = false;
            break;
          }
          if(aName){ //true
            document.getElementById('acctName').innerHTML = '<p><strong>Account Name: </strong>'+aName+'</p><input type="hidden" name="acName" value="'+aName+'">';
          }
          else{
            document.getElementById('acctName').innerHTML = '<p>account number not identified</p>';
          }
        
        }
        else{
            document.getElementById('acctName').innerHTML = '<p>account number not identified</p>';
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
