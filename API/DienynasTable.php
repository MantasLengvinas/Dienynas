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
?>

<?php //timetable load

    $dayNames = array(0, 'Pr', 'An', 'Tr', 'Kt', 'Pn', 'Št', 'Sk');
    $en = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $lt = array('Sausis', 'Vasaris', 'Kovas', 'Balandis', 'Gegužė', 'Birželis', 'Liepa', 'Rugpjūtis', 'Rugsėjis', 'Spalis', 'Lapkritis', 'Gruodis');

    $subjects = array();

    $link = getLink($host, $user, $pass, $db);
    $query = "SELECT subject FROM stdata";
    $result = mysqli_query($link, $query);
    $num_rows = mysqli_num_rows($result);

    if(mysqli_num_rows($result) != 0) {
        $i = 0;                   
        while($data=mysqli_fetch_assoc($result)){ 
            $subject = $data['subject'];
            $subjects[$i] = $subject;
            $i++;
        }
    }

    setlocale(LC_ALL, "lt_LT");

    $metai = $_POST['metai'];
    $menuo = $_POST['menuo'];
    $metai = (int)$metai;
    $menuo = (int)$menuo;

    $timeinfo = array();
    $timeinfo = getdate();
    extract($timeinfo);
    $today = $mday;
    $thisMonth = $mon;

    $dateObj   = DateTime::createFromFormat('!m', $menuo);
    $monthName = $dateObj->format('F');
    $monthName = str_ireplace($en, $lt, $monthName);
    $monthName = strtoupper($monthName);

    $daysNumber = cal_days_in_month(CAL_GREGORIAN, $menuo, $metai);

    $monthString = $menuo;

    if(strlen($monthString) == 1){
        $monthString = '0'.$monthString;
    }

    $date = date_create($monthString.'/01'.'/'.$metai);
    $unix_time = date_format($date, 'U');

    $startinfo = getdate($unix_time);
    extract($startinfo);
    $startDay = $wday;

    echo('<div style="position:absolute;top:0;z-index:2;" id="">
    <table class="dienynas" id="">
        <thead>
            <tr><td class="dalykai">'.$monthName.'</td></tr>
        </thead>
        <tbody id="subj">');
            foreach($subjects as $sbj){
                echo '<tr><td class="dalykai">'.$sbj.'</td></tr>';
            }
        echo('</tbody>
    </table>
    </div>
    <div id="scrollable_dienynas" style="overflow-x:scroll;position:relative;top:0;width:765px;z-index:1;padding-bottom:5px;">');

    echo ('<table class="dienynas" style="width: 928px">
        <thead>
            <tr>
                <td class="dalykai">'.$monthName.'</td>');
                $counter = $startDay;
                for($i = 1; $i <= $daysNumber; $i++){
                    if($i == $today && $menuo == $thisMonth && $counter > 5){
                        echo '<td class="wday today weekend">'.$i.'<div style="color:inherit;font-size:0.8em;padding:0;margin:0">'.$dayNames[$counter].'</div></td>';
                    }
                    else if($i == $today && $menuo == $thisMonth){
                        echo '<td class="wday today">'.$i.'<div style="color:inherit;font-size:0.8em;padding:0;margin:0">'.$dayNames[$counter].'</div></td>';
                    }
                    else if($counter > 5){
                        echo '<td class="wday weekend">'.$i.'<div style="color:inherit;font-size:0.8em;padding:0;margin:0">'.$dayNames[$counter].'</div></td>';
                    }
                    else{
                        echo '<td class="wday">'.$i.'<div style="color:inherit;font-size:0.8em;padding:0;margin:0">'.$dayNames[$counter].'</div></td>';
                    }
                    if($counter == 7){
                        $counter = 0;
                    }
                   $counter++;
                }
            echo ('</tr>
        </thead>
        <tbody>');
            $counter = $startDay;
            $subjectNumber = 0;
            foreach($subjects as $sbj){
                    echo '<tr><td class="dalykai">'.$sbj.'</td>';
                    for($i = 1; $i <= $daysNumber; $i++){
                        $id = 'm'.$menuo.'d'.$i.'s'.$subjectNumber;
                        if($counter > 5){
                            echo '<td class="weekend" id="'.$id.'"></td>';
                        }
                        else{
                            echo '<td id="'.$id.'"></td>';
                        }
                        if($counter >= 7){
                            $counter = 0;
                        }
                        if($i == $daysNumber){
                            $counter = $startDay - 1;
                        }
                       $counter++;
                    }
                    $subjectNumber++;
                    echo '</tr>';
                }
        echo '</tbody>';

?>