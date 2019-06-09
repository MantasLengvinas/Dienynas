<?php  //DB config

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
?>

<?php 
    $id = $_POST['id'];

    $sql = "DELETE FROM marks WHERE id = $id";
    
if ($link->query($sql) === true) {
    echo 'Pažymys sėkmingai ištrintas ('.$id.')';
} else {
    echo "Klaida: " . $sql . "<br>" . $conn->error;
}

$link->close();
?>