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
$teachers = [];
$subjects = [];

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

$i = 0;

if(mysqli_num_rows($subjr) != 0) {                  
   while($m = mysqli_fetch_assoc($subjr)){
      
      $subjects[$i] = $m['subject'];
      $teachers[$i] = $m['teacher'];

      $i++;
      
   }
} 

$subj = 0;
$gsum = 0; 
$g = 0;
$gavg = 0;


//ST data

echo '<table class="c_main_table wrap_text left" style="width: 200px;">
            <colgroup>
                <col class="fixed" width="200">
                
                
                    
            </colgroup>
            <thead class="grey bold">
                <tr style="height: 43px;">
                    <th class="fixed">Dalykas / mokytojas</th>
                    
                    
                        
                </tr>
            </thead>
            <tbody >';
            for($j = 0; $j < $i; $j++){
               echo '<tr style="height: 48px;">
               <td class="fixed">
                  <div style="font-size:1.05em;font-weight:bold;">'.$subjects[$j].'</div>
                     <div style="font-size:0.9em;">'.$teachers[$j].'</div>
               </td>     
               </tr>';
            }
           echo '<tr style="background: rgb(238, 238, 238) none repeat scroll 0% 0%; height: 48px;">
           <td class="fixed" style="padding-top:10px;padding-bottom:10px;"><div style="font-weight:bold;font-size:20px">Vidurkis:</div></td>
         </tr> </tbody>
        </table>';

      //Period table

if($period != 3) {
   
   echo '<div class="left slider_holder" id="slenkanti_dalis" style="width: 565px; height: 884px;"><table class="c_main_table wrap_text left">
   <colgroup>
       
       <col width="600">
       <col width="50">
           <col width="50">
   </colgroup>
   <thead class="grey bold">
       <tr style="height: 43px;">
           
           <th>Pažymiai</th>
           <th>Vidurkis</th>
               <th>Pagr.</th>
       </tr>
   </thead>
   <tbody>';
   for($j = 0; $j < $i; $j++){ 

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
  $gavg = round($gsum / $g, 2);
  echo '
<tr style="background: rgb(238, 238, 238) none repeat scroll 0% 0%; height: 48px;">
                    
<td style="padding-top:10px;padding-bottom:10px;">
        <span style="font-weight:bold;font-size:20px">'; if($gavg > 0){echo $gavg;}echo '</span>
</td>
<td></td>

    <td class="a_center" style="padding-top:10px;padding-bottom:10px;">';
       if($gavg > 0 && $period == 1){echo '<span style="font-weight:bold;font-size:20px">'.$gavg;}
    echo '</span></td>
</tr></tbody>
</table>';
}else{
   echo '<div class="left slider_holder" id="slenkanti_dalis" style="width: 565px; height: 927px;"><table class="c_main_table wrap_text left">
   <colgroup>
       
               <col width="604 / 3">
               <col width="604 / 3">
               <col width="604 / 3">
   </colgroup>
   <thead class="grey bold">
       <tr style="height: 43px;">
           
               <th class="a_center right_border" colspan="1" title="1 pusmetis išvestas pažymys">
                   1 pusmetis
               </th>
               <th class="a_center right_border" colspan="1" title="2 pusmetis išvestas pažymys">
                   2 pusmetis
               </th>
               <th class="a_center right_border" colspan="1" title="Metinis išvestas pažymys">
                   Metinis
               </th>
       </tr>
   </thead>

   <tbody>
           <tr style="height: 48px;">
               
                           <td class="a_center" style="font-size:15px"><span>10</span></td>
                           <td class="a_center" style="font-size:15px"><span></span></td>
                           <td class="a_center" style="font-size:15px"><span></span></td>
           </tr>
           <tr style="height: 48px;">
               
                           <td class="a_center" style="font-size:15px"><span>10</span></td>
                           <td class="a_center" style="font-size:15px"><span>10</span></td>
                           <td class="a_center" style="font-size:15px"><span>10</span></td>
           </tr>
           <tr style="height: 48px;">
               
                           <td class="a_center" style="font-size:15px"><span>įsk.</span></td>
                           <td class="a_center" style="font-size:15px"><span></span></td>
                           <td class="a_center" style="font-size:15px"><span></span></td>
           </tr>
           <tr style="height: 48px;">
               
                           <td class="a_center" style="font-size:15px"><span>9</span></td>
                           <td class="a_center" style="font-size:15px"><span>7</span></td>
                           <td class="a_center" style="font-size:15px"><span>8</span></td>
           </tr>
           <tr style="height: 48px;">
               
                           <td class="a_center" style="font-size:15px"><span>įsk.</span></td>
                           <td class="a_center" style="font-size:15px"><span></span></td>
                           <td class="a_center" style="font-size:15px"><span></span></td>
           </tr>
           <tr style="height: 48px;">
               
                           <td class="a_center" style="font-size:15px"><span>9</span></td>
                           <td class="a_center" style="font-size:15px"><span></span></td>
                           <td class="a_center" style="font-size:15px"><span></span></td>
           </tr>
           <tr style="height: 48px;">
               
                           <td class="a_center" style="font-size:15px"><span>8</span></td>
                           <td class="a_center" style="font-size:15px"><span>8</span></td>
                           <td class="a_center" style="font-size:15px"><span>8</span></td>
           </tr>
           <tr style="height: 67px;">
               
                           <td class="a_center" style="font-size:15px"><span>10</span></td>
                           <td class="a_center" style="font-size:15px"><span></span></td>
                           <td class="a_center" style="font-size:15px"><span></span></td>
           </tr>
           <tr style="height: 48px;">
               
                           <td class="a_center" style="font-size:15px"><span>įsk.</span></td>
                           <td class="a_center" style="font-size:15px"><span>įsk.</span></td>
                           <td class="a_center" style="font-size:15px"><span>įsk.</span></td>
           </tr>
           <tr style="height: 48px;">
               
                           <td class="a_center" style="font-size:15px"><span>6</span></td>
                           <td class="a_center" style="font-size:15px"><span>7</span></td>
                           <td class="a_center" style="font-size:15px"><span>7</span></td>
           </tr>
           <tr style="height: 48px;">
               
                           <td class="a_center" style="font-size:15px"><span>7</span></td>
                           <td class="a_center" style="font-size:15px"><span></span></td>
                           <td class="a_center" style="font-size:15px"><span></span></td>
           </tr>
           <tr style="height: 48px;">
               
                           <td class="a_center" style="font-size:15px"><span>įsk.</span></td>
                           <td class="a_center" style="font-size:15px"><span></span></td>
                           <td class="a_center" style="font-size:15px"><span></span></td>
           </tr>
           <tr style="height: 48px;">
               
                           <td class="a_center" style="font-size:15px"><span>10</span></td>
                           <td class="a_center" style="font-size:15px"><span></span></td>
                           <td class="a_center" style="font-size:15px"><span></span></td>
           </tr>
           <tr style="height: 48px;">
               
                           <td class="a_center" style="font-size:15px"><span></span></td>
                           <td class="a_center" style="font-size:15px"><span></span></td>
                           <td class="a_center" style="font-size:15px"><span></span></td>
           </tr>
           <tr style="height: 48px;">
               
                           <td class="a_center" style="font-size:15px"><span>įsk.</span></td>
                           <td class="a_center" style="font-size:15px"><span></span></td>
                           <td class="a_center" style="font-size:15px"><span></span></td>
           </tr>
           <tr style="height: 48px;">
               
                           <td class="a_center" style="font-size:15px"><span>7</span></td>
                           <td class="a_center" style="font-size:15px"><span></span></td>
                           <td class="a_center" style="font-size:15px"><span></span></td>
           </tr>
       <tr style="background: rgb(238, 238, 238) none repeat scroll 0% 0%; height: 48px;">
           
                       <td class="a_center" style="padding-top:10px;padding-bottom:10px;">
                           <span style="font-weight:bold;font-size:20px">8,6</span>
                       </td>
                       <td class="a_center" style="padding-top:10px;padding-bottom:10px;">
                           <span style="font-weight:bold;font-size:20px">8</span>
                       </td>
                       <td class="a_center" style="padding-top:10px;padding-bottom:10px;">
                           <span style="font-weight:bold;font-size:20px">8,25</span>
                       </td>


       </tr>
   </tbody>
</table></div>';
}


?>