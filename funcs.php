<?php
function connectToDb(){
  $dbn = '
  $user = '
  $pwd  = '
  try {
    return new PDO($dbn, $user, $pwd);
  } catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
  }
}
?>