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
      //$userForBankAccount = null;
      if(strpos($line, 'UserName') !== FALSE){
        $username = explode("=", $line);
        //$userForBankAccount = substr($username[1], 0, -2); //old
        $userForBankAccount = rtrim($username[1]);
        if($userForBankAccount != null)
          echo "<div class=\"col-sm-4\"><h3>".$userForBankAccount."</h3>";
      }
      if(strpos($line, 'Bonus') !== FALSE)
      {

        if($userForBankAccount != null)
        {
          $amount = getBankAccountFromSQL($userForBankAccount);
          $coins = explode("=", $line);
          if((int)$coins[1] < 50){
            echo "<font color=\"red\">";
          }
          echo "<p>Coins : ".$coins[1]."</p>";
          if((int)$coins[1] < 50){
            echo "</font>";
          }
          echo "<p>Bank : $".number_format(((int)$amount/100), 2, '.', ' ')."</p>";
          echo "<p><form action=\"index.php\" method=\"post\"><input type=\"submit\" name=\"EnableAccount".$userForBankAccount."\" value=\"Enable Account\" /></form></p>";
          echo "<p><form action=\"index.php\" method=\"post\"><input type=\"submit\" name=\"DisableAccount".$userForBankAccount."\" value=\"Disable Account\" /></form></p>";
          echo "<p><form action=\"index.php?action=add&user=".$userForBankAccount."&amount=20\" method=\"post\"><input type=\"submit\" name=\"Add20Coins".$userForBankAccount."\" value=\"Add 20 Coins\" /></form></p>";
          echo "</div>";
        } else {
          $amount = 0;
        }
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
		$userForBankAccount = rtrim($username[1]);
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
