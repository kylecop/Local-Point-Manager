<?php

include('header.php');
//include('addCoins.php');
include('getFromSQL.php');
include('fopen_utf8.php');
include('displayCoins.php');
include('displayCoinManagement.php');
include('postToSQL.php');
include('displaySettings.php');
include('unlockAccounts.php');
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['DisableSessions']))
    {
        SetSessionsDisabled("1");
    }
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['EnableSessions']))
    {
        SetSessionsDisabled("0");
    }
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['UnlockAccounts']))
    {
        unlockAccounts();
    }
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['DisableAccountMiguel']))
    {
        disableAccount("Miguel");
    }
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['EnableAccountMiguel']))
    {
        enableAccount("Miguel");
    }
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['DisableAccountMadilynn']))
    {
        disableAccount("Madilynn");
    }
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['EnableAccountMadilynn']))
    {
        enableAccount("Madilynn");
    }
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['DisableAccountMakayla']))
    {
        disableAccount("Makayla");
    }
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['EnableAccountMakayla']))
    {
        enableAccount("Makayla");
    }
if(!empty($_GET['user']) && !empty($_GET['action']) ){
	if(!empty($_GET['other_amount'])){
   		addCoins( $_GET['user'], $_GET['action'], $_GET['other_amount'] );
	}else{
   		addCoins( $_GET['user'], $_GET['action'], $_GET['amount'] );
	}
}else{
	 displaySettings();
   displayUnlockAccounts();
   displayCoinManagement();
   displayCoins();
   getLogFromSQL();
}

?>
