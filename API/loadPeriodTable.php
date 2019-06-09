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

$link = getLink($host, $user, $pass, $db);

include "PeriodData.php";

$period = $_POST['id'];
$period = (int)$period;

class Mark{
    public $subject = "";
    public $month = "";
    public $day = "";
    public $mark = "";
    public $type = "";
}

$marks = [];

$markq = "SELECT * FROM marks";
$marksr = mysqli_query($link, $markq);

if(mysqli_num_rows($marksr) != 0) {                  
   while($m = mysqli_fetch_assoc($marksr)){
      $subject = $m['subject'];
      $month = $m['month'];
      $day = $m['day'];
      $mark = $m['mark'];
      $type = $m['type'];
      
      switch($period){
         case 1:
            if($month >= 9){
              $ma = new Mark();
      
              $ma->subject  = $subject;
              $ma->month = $month;
              $ma->day  = $day;
              $ma->mark = $mark;
              $ma->type  = $type;

              array_push($marks, $ma);
            }
         break;
         case 2:
            if($month > 1 && $month != 9 && $month != 10 && $month != 11 && $month != 12){
              $ma = new Mark();
      
              $ma->subject  = $subject;
              $ma->month = $month;
              $ma->day  = $day;
              $ma->mark = $mark;
              $ma->type  = $type;

              array_push($marks, $ma);
            }
         break;
      }
      
      
   }
} 

$JSONMarks = json_decode(json_encode($marks), true);

$subjq = "SELECT * FROM stdata";
$subjr = mysqli_query($link, $subjq);

$subj = 0;
$gsum = 0; 
$g = 0;
$gavg = 0;

if(mysqli_num_rows($subjr) != 0) {                  
    while($s = mysqli_fetch_assoc($subjr)){ 

        echo '
           <tr style="height: ';if($subj != 7){ echo '48px'; }else{ echo '67px'; }; echo '">              
              <td>';
              
              $sum = 0;
              $k = 0;
              $avg = 0;
              
                foreach($JSONMarks as $mark){
                   if($mark['subject'] == $subj){
                      echo '<div style="text-align:center;cursor:pointer;font-size:15px;display:inline-block;vertical-align:top;margin-right:10px;font-weight:normal;">
                                        <span class="';if($mark['type'] == 0){echo 'color_kontr bold';}echo '">';if($mark['mark'] == 0){echo 'įsk.';}else{echo $mark['mark'];}echo '</span>
                                      </div>';
                                      $sum += $mark['mark'];
                                      $k++;
                   }                   
                }
                if($k > 0){
                   $avg = $sum / $k;
                   if($avg != 0){
                      $gsum += $avg;
                      $g++;
                   }
                   $avg = round($avg, 2);
                   updatePeriod($link, $period, $subj, $avg);
                }
                
              echo '</td>
                        
              <td class="a_center" style="font-size:15px">
                <span>';if($avg > 0){echo $avg;} echo '</span>
              </td>
              
                        
              <td class="a_center"><span style="font-weight:bold;font-size:15px">';if($period == 1){if($avg > 0){echo round($avg, 0);}}echo '</span></td>
           </tr>';
                    
        $subj++;
        $avg = 0;
    }
}

$gavg = round($gsum / $g, 2);
 
 echo '<tr style="background: rgb(238, 238, 238) none repeat scroll 0% 0%; height: 48px;">
                    
                    <td style="padding-top:10px;padding-bottom:10px;">
                            <span style="font-weight:bold;font-size:20px">'; if($gavg > 0){echo $gavg;}echo '</span>
                    </td>
                    <td></td>

                        <td class="a_center" style="padding-top:10px;padding-bottom:10px;">';
                           if($gavg > 0 && $period == 1){echo '<span style="font-weight:bold;font-size:20px">'.$gavg;}
                        echo '</span></td>
                </tr>';   


?>