
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
    $month = $_POST['month'];
    $day = $_POST['day'];
    $subject = $_POST['subject'];
    $mark = $_POST['mark'];
    $type = $_POST['type'];

    $sql = "INSERT INTO marks (subject, month, day, mark, type)
VALUES ($subject, $month, $day, $mark, $type)";

if ($link->query($sql) === true) {
    echo 'Pažymys sėkmingai įrašytas ('.$subject.$month.$day.$mark.$type.')';
} else {
    echo 'Klaida: ' . $sql . '<br>' . $conn->error;
}

$link->close();

?>