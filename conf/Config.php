<?php

/**
* 
*/
class Config
{
  var $dbase_type, $host, $dbase, $username, $password;
  function __construct(){
    
  }

  static function db_credentials( $dbase_type = 'mysql', $host='localhost', $dbase = 'rapido', $username = 'root', $password = ''){
    $this->dbase_type = $dbase_type;
    $this->host = $host;
    $this->dbase = $dbase;
    $this->username = $username;
    $this->password = $password;


  }

  //static function

}
