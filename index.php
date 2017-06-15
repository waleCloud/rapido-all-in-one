<?php
  require_once 'conf/DB.php';
  $sess = (array) $_SESSION;

  if(isset($val['login']))
  {
    $username = $val['username'];
    $pin = $val['pin'];

    $sql = "SELECT id, username, pin, init_bank, banks, bvn  FROM users WHERE username='{$username}' AND pin={$pin};";
    $result = $db->query($sql);
    if($result->num_rows > 0)
    {
      
      $row = $result->fetch_assoc();
      $_SESSION['id'] = $row['id'];
      $_SESSION['username'] = $row['username'];
      $_SESSION['pin'] = $row['pin'];
      $_SESSION['init_bank'] = $row['init_bank'];
      $_SESSION['banks'] = $row['banks'];
      $_SESSION['bvn'] = $row['bvn'];

      $sp_ibank = Split($_SESSION['init_bank']);
      $sp_banks = Split($_SESSION['banks']);

      // Get the initial bank details
      $_SESSION['ibank_name'] = $sp_ibank[0];
      $_SESSION['ibank_num'] = $sp_ibank[1];

      $_SESSION['sp_banks'] = $sp_banks; // the other banks as a sess variable
      
      //Get other banks details vai splitting the string
      

      echo "<script language='javascript' type='text/javascript'> window.location.href='home.php';
            </script>";
    }
    else {
      echo "<script language='javascript' type='text/javascript'> alert('Incorrect Login details');</script>";
    }
  }

  if(isset($val['regCont']))
  {
    $_SESSION['pin'] = $val['pin'];
    $_SESSION['username'] = $val['username'];
    $_SESSION['initBankName'] = $val['initBankName'];
    $_SESSION['initBankNum'] = $val['initBankNum'];
    $_SESSION['acctName'] = $val['acName'];

    echo "<script language='javascript' type='text/javascript'> window.location.href='bvnAuth.php';
            </script>";

  }
$msg = '';
  if(isset($_GET['pid']) == 1)
  {
    $msg = "Welcome! You can now Sign in to your account.";
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
  <p><?= $msg; ?></p>
  <div class="panel panel-default">
    <div class="panel-heading">Login</div>
    <form method="post" action="">
      <label>Username:</label>
      <input type="text" class="form-control" name="username" placeholder="awesome" required="true">
      <label>Rapido Pin</label>
      <input type="number" class="form-control" name="pin" placeholder="1234" required="true">
      <label></label>
      <input type="submit" name="login" class="btn form-control btn-success" value="Login">
    </form>
  </div>
<a class="" data-toggle="collapse" href="#collapseSignUp" aria-expanded="false" aria-controls="collapseSignUp">
  Don't have an account? SignUp here
</a>
  <div id="collapseSignUp" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
    <div class="panel panel-default">
      <div class="panel-heading">Signup for rapido</div>
          <form method="post" action=""><div class="form-group">
            <label>Username:</label>
            <input type="text" name="username" class="form-control" placeholder="username" required="true">
            <label for="bank">Choose your bank:</label>
            <select class="form-control" name="initBankName" id="bank" required="true">
              <option></option>
              <option value="Access Bank">Access Bank</option>
              <option value="First Bank">First Bank</option>
              <option value="GTB">GTB</option>
              <option value="UBA">UBA</option>
              <option value="Zenith Bank">Zenith Bank</option>
            </select>
            <label>Choose rapido Pin</label>
            <input type="number" class="form-control" name="pin" placeholder="1234" maxlength="4" size="4" required="true">
            <label for="">Account Number:</label>
            <input type="number" class="form-control" id="acctNum" name="initBankNum" placeholder="" required="true" size="10" oninput="verifyAcct()" onchange="verifyAcct()"><small style="font-size: 10px; color: #035925;">Use any: 021985642, 2602564211, 0060284639, 0160284639, 0012872302 </small>
            <label>&nbsp;</label>
            <div id="acctName">
            </div>
          </div></form></div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3"></div>

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
            document.getElementById('acctName').innerHTML = '<p><strong>Account Name: </strong>'+aName+'</p>click to continue <input type="submit" name="regCont" value="Continue" class="btn-primary"><input type="hidden" name="acName" value="'+aName+'">';
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
