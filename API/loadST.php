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
$query = "SELECT * FROM stdata";
$result = mysqli_query($link, $query);

if(mysqli_num_rows($result) != 0) {                  
    while($data=mysqli_fetch_assoc($result)){ 
        $subject = $data['subject'];
        $teacher = $data['teacher'];
        
        echo('<tr style="height: 48px;">
                 <td class="fixed">
                    <div style="font-size:1.05em;font-weight:bold;">'.$subject.'</div>
                       <div style="font-size:0.9em;">'.$teacher.'</div>
                 </td>     
              </tr>');
    }
}

echo('<tr style="background: rgb(238, 238, 238) none repeat scroll 0% 0%; height: 48px;">
        <td class="fixed" style="padding-top:10px;padding-bottom:10px;"><div style="font-weight:bold;font-size:20px">Vidurkis:</div></td>
      </tr>');

?>