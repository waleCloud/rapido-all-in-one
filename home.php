<!DOCTYPE html>
<html lang="en" ng-app="">
  <head>
    <meta charset="utf-8">
    <title>Rapido - All-in-one</title>
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
       <li class="active"><a href="#"><i class="fa fa-tachometer fa-2x"></i> Home</a></li>
       <li><a href="transfer.php"><i class="fa fa-exchange fa-2x"></i> Tranfers</a></li>
       <li><a href="bills.php"><i class="fa fa-money fa-2x"></i> Pay bills</a></li>
       <li><a href="airtimes.php"><i class="fa fa-mobile fa-2x"></i> Buy Airtimes</a></li>
       <li><a href="stats.php"><i class="fa fa-bank fa-2x"></i> Transaction Statements</a></li>
       <li><a href="bal.php"><i class="fa fa-bar-chart fa-2x"></i> Balance</a></li>
     </ul>
   </div>
    </div>

  </div>
</nav>
<div class="">
  <h5>Rapido rules them all<small> Select a task to continue </small></h5>

  <div class="col-md-2"></div>

  <div class="col-md-8 pagination-centered panel-collapse collapse in" id="collapseLogin">
  <div class="panel panel-default">
    <div class="panel-heading"></div>
    <div class="panel-body">
      
    <div class="row">
        <div class="col-md-4">
          <a href="#"><i class="fa fa-tachometer"></i> Dashboard </a>
        </div>
        <div class="col-md-4">
          <a href="transfer.php"><i class="fa fa-exchange"></i> Transfers </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
          <a href="bills.php"><i class="fa fa-money"></i> Pay bills </a>
        </div>
        <div class="col-md-4">
          <a href="airtime.php"><i class="fa fa-mobile"></i> Buy Airtime </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
       <a href="stats.php"><i class="fa fa-bank"></i> Statements </a>
        </div>
        <div class="col-md-4">
          <a href="bal.php"><i class="fa fa-bar-chart"></i> Account Balance </a>
        </div>
    </div>
    </div>
  </div>

  </div>

  <div class="col-md-2"></div>

  </div>

    </div>
    <!-- /.container -->

    <script type="text/javascript">
      
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
