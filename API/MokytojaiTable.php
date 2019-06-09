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
$query = "SELECT * FROM stdata";
$result = mysqli_query($link, $query);
$num_rows = mysqli_num_rows($result);
$i = 0; 

if(mysqli_num_rows($result) != 0) {                  
    while($data=mysqli_fetch_assoc($result)){ 
        $subject = $data['subject'];
        $teacher = $data['teacher'];
        $subjects[$i] = $subject;
        $teachers[$i] = $teacher;
        $i++;
    }
}
?>

<?php 
    echo '<table class="dienynas">
        <thead>
            <tr>
                <td class="header-td">MOKYTOJAS</td>
                <td class="header-td">DALYKAS</td>
            </tr>
        </thead>
        <tbody>';
            for($j = 0; $j < $i; $j++){
                echo '<tr><td>'.$teachers[$j].'</td><td>'.$subjects[$j].'</td></tr>';
            }
        echo '</tbody>
    </table>';
?>