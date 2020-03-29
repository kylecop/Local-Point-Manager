<?php


function displaySettings(){
  $sessionStatus = getSqlString("SELECT value FROM settings WHERE `settingName`='isSessionDisabled'");
  if($sessionStatus == "1")
    $sessionStatus = "<font color=red>Yes</font>";
  else {
    $sessionStatus = "No";
  }
  echo "Sessions Limit: ".getSqlString("SELECT value FROM settings WHERE `settingName`='sessionLimit'")." minutes";
  echo "<br>Sessions Disabled: ".$sessionStatus;
  
  echo "<br>Number of Coins Required: ".getSqlString("SELECT value FROM settings WHERE `settingName`='numCoinsRequired'");
  echo "<form action=\"index.php\" method=\"post\"><input type=\"submit\" name=\"DisableSessions\" value=\"Disable Sessions\" /></form>";
  echo "<form action=\"index.php\" method=\"post\"><input type=\"submit\" name=\"EnableSessions\" value=\"Enable Sessions\" /></form>";
  echo "<form action=\"uploadForm.php\" method=\"post\"><input type=\"submit\" name=\"uploadForm\" value=\"Upload Konnect\" /></form>";

  //echo "<br><button type=\"button\" class=\"btn btn-primary\">Enable Sessions</button>";
  //echo "<br><button type=\"button\" class=\"btn btn-primary\">Disable Sessions</button>";

}

function SetSessionsDisabled($answer){
  postToSqlComputerSettings("settings", $answer, "isSessionDisabled");
}
?>
