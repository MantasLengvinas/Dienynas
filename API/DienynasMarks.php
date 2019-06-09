<?php //load marks
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

$metai = $_POST['metai'];
$menuo = $_POST['menuo'];

class Mark{
    public $subject = "";
    public $month = "";
    public $day = "";
    public $mark = "";
    public $type = "";
    public $timestamp = "";
}

$link = getLink($host, $user, $pass, $db);
$query = "SELECT * FROM marks";
$result = mysqli_query($link, $query);
$num_rows = mysqli_num_rows($result);

$marks = array();

if(mysqli_num_rows($result) != 0) {                   
    while($data=mysqli_fetch_assoc($result)){ 
        //Passing values from db to variables

        $subject = $data['subject'];
        $month = $data['month'];
        $day = $data['day'];
        $mark = $data['mark'];
        $type = $data['type'];
        $timestamp = $data['timestamp'];

        if($month == $menuo){
            $m = new Mark();

            $m->subject  = $subject;
            $m->month = $month;
            $m->day  = $day;
            $m->mark = $mark;
            $m->type  = $type;
            $m->timestamp = $timestamp;

            array_push($marks, $m);
        }

    }
}

$json = json_encode($marks);

echo($json);
?>
