<?php include_once '../config/init.php'; ?>

<?php 
    $user = new User;
    $log = "../log.txt";
    $sessionTime = date('Y-m-d H:i:s');
    $logMsg = "[SESSION_EXPIRED] username: <b>".$_SESSION['username']."</b> at: <i>".$sessionTime."</i>\n";      
    file_put_contents($log, $logMsg, FILE_APPEND | LOCK_EX);

    $user->Logout();
?>