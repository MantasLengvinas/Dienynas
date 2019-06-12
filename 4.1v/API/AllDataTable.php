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
$subjects = [];
$teachers = [];

$link = getLink($host, $user, $pass, $db);
$stquery = "SELECT * FROM stdata";
$mquery = "SELECT * FROM marks";
$stresult = mysqli_query($link, $stquery);
$mresult = mysqli_query($link, $mquery);

// if(mysqli_num_rows($result) != 0) {                  
//     while($data=mysqli_fetch_assoc($result)){ 
//         $subject = $data['subject'];
//         $teacher = $data['teacher'];
//     }
// }
?>

<?php 

    echo '<?.content.?>';
?>