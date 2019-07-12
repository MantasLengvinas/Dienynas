<?php include_once '../config/init.php'; ?>

<?php 
    $user = new User;
    $log = "../log.txt";
    $sessionTime = date('Y-m-d h:i:sa');
    $logMsg = "[SESSION_EXPIRED] session username: ".$_SESSION['username']." expiration time: ".$sessionTime."\n";      
    file_put_contents($log, $logMsg, FILE_APPEND | LOCK_EX);

    $user->Logout();
?>