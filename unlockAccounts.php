<?php

function displayUnlockAccounts(){
  echo "<form action=\"index.php\" method=\"post\"><input type=\"submit\" name=\"UnlockAccounts\" value=\"Unlock Accounts\" /></form>";
}

function unlockAccounts(){
  //exec('START C:\unlockAccounts.bat &');
  shell_exec('net user miguel /active:yes');
  shell_exec('net user madilynn /active:yes');
  shell_exec('net user makayla /active:yes');

  }

  function disableAccount($user){
    echo shell_exec("net user ".$user." /active:no");
  }
  function enableAccount($user){
    echo shell_exec("net user ".$user." /active:yes");
  }
?>
