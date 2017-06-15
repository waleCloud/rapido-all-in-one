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
    <title>Rapido - Account Transaction Statement</title>
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
       <li><a href="transfer.php"><i class="fa fa-exchange fa-2x"></i> Tranfers</a></li>
       <li><a href="bills.php"><i class="fa fa-money fa-2x"></i> Pay bills</a></li>
       <li><a href="airtime.php"><i class="fa fa-mobile fa-2x"></i> Buy Airtimes</a></li>
       <li class="active"><a href="#"><i class="fa fa-bank fa-2x"></i> Transaction Statements</a></li>
       <li><a href="bal.php"><i class="fa fa-bar-chart fa-2x"></i> Balance</a></li>
     </ul>
   </div>
    </div>

  </div>
</nav>
<div class="">
  <h5>See all Account Transaction Statements<small>Download as PDF single file</small></h5>

  <div class="col-md-2"></div>

  <div class="col-md-8 pagination-centered panel-collapse collapse in" id="collapseLogin">
  <div class="panel panel-default">
    <div class="panel-heading"></div>
    <div class="panel-body">
        <p>Download as PDF</p>
        <!-- Design the statement here -->

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
