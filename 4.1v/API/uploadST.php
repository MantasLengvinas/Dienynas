<?php 

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
?>

<?php 
    if(isset($_POST['submit'])){
        $teacher = $_POST['m_vardas'];
        $subject = $_POST['dalykas'];
    }

    $link = getLink($host, $user, $pass, $db);

    $sql = "INSERT INTO stdata (teacher, subject) " 
    . "VALUES ('$teacher','$subject')";

if(mysqli_query($link, $sql)){
    echo "Mokytojas sėkmingai įrašytas.";
} else{
    echo "Klaida! Įkelti nepavyko. $sql. " . mysqli_error($link);
}

    mysqli_close($link);
?>