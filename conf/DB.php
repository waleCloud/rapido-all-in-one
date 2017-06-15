<?php

  session_start();
  $val = (array) $_POST;
  $sess = (array) $_SESSION;

	$dbase_type = 'mysql'; $host='localhost'; $dbase = 'rapido'; $user = 'root'; $password = '';
	$db = new mysqli ( $host, $user, $password, $dbase );
		if($db->connect_error){
			die("Error connecting: ".$db->connect_error);
		}

function ranDetails()
{
	$banks = array (
		'UBA',
		'GTB',
		'Access bank',
		'First bank',
		'Zenith bank'
	);
	$nums = array (
		'0219856428',
		'2602564211',
		'0060284639',
		'0160284639',
		'0012872302'
	);
	$names = array (
		'Tomisin Uche',
		'Azeez Emeka',
		'Nnamdi Toyin',
		'Bisola Taiwo',
		'Joseph Bassey'
	);

	$bank = array_rand($banks);
	$num = array_rand($nums);
	$name = array_rand($names);

	$acct = array(
		'bank' => $banks[$bank],
		'num' => $nums[$num],
		'name' => $names[$name]
	);
	return $acct;
}

function Split ( $string )
{
	$arr = explode(',', $string);
	return $arr;
}
