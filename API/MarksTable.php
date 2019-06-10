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

function markType($id){
   $color = 0;

   switch($id){
        case 0:
            $color = 'color_kontr';
        break;
        case 1:
            $color = 'color_sav';
        break;
        case 2:
            $color = 'color_klases';
        break;
        case 3:
            $color = 'color_kaupiamasis';
        break;
        case 4: 
            $color = 'color_praktinis';
        break;
        case 5:
            $color = 'color_namu';
        break;
        case 6:
            $color = 'color_iskaita';
    }
    return $color;
}


$subjects = [];
$j = 0;

$q = "SELECT subject FROM stdata";
$r = mysqli_query($link, $q);

if(mysqli_num_rows($r) != 0) {                  
    while($data=mysqli_fetch_assoc($r)){ 
        $subject = $data['subject'];
        $subjects[$j] = $subject;
        $j++;
    }
}

$en = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
$lt = array('Sausis', 'Vasaris', 'Kovas', 'Balandis', 'Gegužė', 'Birželis', 'Liepa', 'Rugpjūtis', 'Rugsėjis', 'Spalis', 'Lapkritis', 'Gruodis');

$filter_type = $_GET['type'];
$filter_input = $_GET['input'];

$result = 0;

switch($filter_type){
    case 'filter_month':
        $query = "SELECT * FROM marks WHERE month = $filter_input ORDER BY timestamp DESC";
        $result = mysqli_query($link, $query);
    break;
    case 'filter_day':
        $query = "SELECT * FROM marks WHERE day = $filter_input ORDER BY timestamp DESC";
        $result = mysqli_query($link, $query);
    break;
    case 'filter_mark':
        $query = "SELECT * FROM marks WHERE mark = $filter_input ORDER BY timestamp DESC";
        $result = mysqli_query($link, $query);
    break;
    case 0:
        $query = "SELECT * FROM marks ORDER BY timestamp DESC";
        $result = mysqli_query($link, $query);
    break;

}

if(mysqli_num_rows($result) != 0) {                  
    while($data=mysqli_fetch_assoc($result)){
        $id = $data['id']; 
        $month = $data['month'];
        $day = $data['day'];
        $subject = $data['subject'];
        $mark = $data['mark'];
        if($mark == 0){
            $mark = 'įsk.';
        }
        $type = $data['type'];

        $dateObj   = DateTime::createFromFormat('!m', $month);
        $month = $dateObj->format('F');
        $month = str_ireplace($en, $lt, $month);

        echo ('<tr class="mark-holder">
                <td class="hidden">'.$id.'</td>
                <td>'.$month.'</td>
                <td>'.$day.'</td>
                <td>'.$subjects[$subject].'</td>
                <td>'.$mark.'</td>
                <td><span class="fa fa-circle '.markType($type).'" style="vertical-align:middle;font-weight:bold;font-size:10px;padding-left:2px;margin-top:-2px"></span></td>
                <td><span class="fa fa-cogs" style="vertical-align:middle;font-weight:bold;padding-left:2px;margin-top:-2px; cursor: pointer;" onclick="editMark('.$id.')"></span></td>
                <td><a class="delete-btn" href="javascript:void(0)" onclick="deleteMark('.$id.');">X</a></td>
            </tr>');
    }
}
?>


