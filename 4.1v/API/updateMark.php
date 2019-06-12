<?php 

ob_start();

include "../config/db.php";

if (!function_exists('getLink')) { 
    function getLink($serverName,$userName,$userPassword,$nameOfDataBase){
        $link=@mysqli_connect($serverName,$userName,$userPassword,$nameOfDataBase);
        if(!$link){
            echo "connection Error".mysqli_connect_errno();
        }
        return $link;
    }
}

$link = getLink($host, $user, $pass, $db);

$id = $_POST['id'];
$month = $_POST['month'];
$day = $_POST['day'];
$subject = $_POST['subject'];
$mark = $_POST['mark'];
$type = $_POST['type'];

$q = "UPDATE marks SET subject='$subject', month='$month', day='$day', mark='$mark', type='$type' WHERE id='$id'";

if($link->query($q) === true){
   echo 'Pažymys ('.$id.') sėkmingai pakeistas';
}else{
   echo 'Klaida!';
}

?>