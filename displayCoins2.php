<?php


function displayCoins(){
  $fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
  $file = fopen_utf8($fileToOpen);
  echo "";
  while(! feof($file))
  {
    $line = fgets($file);
    //echo $line . "<br />";
    if(strpos($line, 'Kyle') === false)
    {
    	if(strpos($line, 'UserName') !== FALSE){
    		$username = explode("=", $line);
		$userForBankAccount = substr($username[1], 0, -1);
    		echo "<div class=\"col-sm-4\"><h3>".$userForBankAccount."</h3>";
    	}
    	if(strpos($line, 'Bonus') !== FALSE)
    	{
		$amount = getBankAccountFromSQL($userForBankAccount);
    		$coins = explode("=", $line);
		if((int)$coins[1] < 20){
			echo "<font color=\"red\">";
			addCoins($userForBankAccount, "add", 20-(int)$coins[1]);
		}
        	echo "<p>Coins : ".$coins[1]."</p>";
		if((int)$coins[1] < 50){
			echo "</font>";
		}
        	echo "<p>Bank : $".number_format(((int)$amount/100), 2, '.', ' ')."</p>";
     		echo "</div>";
    	}
    }

  }
  fclose($file);
}

function getCoins($user){
  $fileToOpen = "C:\Program Files (x86)\EasyBits For Kids\_Users.dat";
  $file = fopen_utf8($fileToOpen);
  echo "";
  while(! feof($file))
  {
    $line = fgets($file);
    //echo $line . "<br />";
    if(strpos($line, $user) !== FALSE)
    {
    	if(strpos($line, 'UserName') !== FALSE){
    		$username = explode("=", $line);
		$userForBankAccount = substr($username[1], 0, -2);
    	}
    	if(strpos($line, 'Bonus') !== FALSE)
    	{
    		$coins = explode("=", $line);
    	}
    }

  }
  fclose($file);
 return (int)$coins[1];
}

?>
