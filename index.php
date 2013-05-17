<?php 
  require_once("includes/common.php"); 
  nav_start_outer("Home");
  nav_start_inner();
?>
<b>Balance:</b> 
<?php 
  $sql = "SELECT Zoobars FROM Person WHERE PersonID=$user->id";
  $rs = $db->executeQuery($sql);
  $balance = $rs->getValueByNr(0,0);
  echo $balance > 0 ? $balance : 0;
?> zoobars<br/>
<b>Your profile:</b>
<form method="POST" name=profileform
  action="<?php echo $_SERVER['PHP_SELF']?>">
<textarea name="profile_update">
<?php
  if($_POST['profile_submit']) {  // Check for profile submission
    $profile = $_POST['profile_update'];

    $hidden_token = $_POST['hidden_token'];
    $sql = "SELECT Token FROM Person WHERE PersonID=$user->id";
    $rs = $db->executeQuery($sql);
    $token = $rs->getValueByNr(0,0);
    if($hidden_token == hash("sha256", token){
      $sql = "UPDATE Person SET Profile='$profile' ".
             "WHERE PersonID=$user->id";
      $db->executeQuery($sql);  // Overwrite profile in database
    }
  }
  $sql = "SELECT Profile FROM Person WHERE PersonID=$user->id";
  $rs = $db->executeQuery($sql);
  echo $rs->getValueByNr(0,0);  // Output the current profile
?>
</textarea><br/>

<!--add a hidden input-->
<?php
        $sql = "SELECT Token FROM Person WHERE PersonID=$user->id";
        $rs = $db->executeQuery($sql);
        $token = $rs->getValueByNr(0,0);
?>
<input type=hidden name=hidden_token value="<?php echo hash("sha256",$token) ?>">

<input type=submit name="profile_submit" value="Save"></form>
<?php 
  nav_end_inner();
  nav_end_outer(); 
?>
