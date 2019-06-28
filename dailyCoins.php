<?php

include('header.php');
include('addCoins.php');
include('getFromSQL.php');
include('fopen_utf8.php');
include('displayCoins2.php');
include('displayCoinManagement.php');
include('postToSQL.php');
if(!empty($_GET['user']) && !empty($_GET['action']) ){
	if(!empty($_GET['other_amount'])){
   		addCoins( $_GET['user'], $_GET['action'], $_GET['other_amount'] );
	}else{
   		addCoins( $_GET['user'], $_GET['action'], $_GET['amount'] );
	}
}else{

   displayCoinManagement();
   displayCoins();
   getLogFromSQL();
}

?>
