<?php

include "../config/db.php";

$id = $_POST['id'];

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

$link = getLink($host, $user, $pass, $db);
$query = "SELECT subject FROM stdata";
$result = mysqli_query($link, $query);
$num_rows = mysqli_num_rows($result);
$i = 0; 

if(mysqli_num_rows($result) != 0) {                  
    while($data=mysqli_fetch_assoc($result)){ 
        $subject = $data['subject'];
        $subjects[$i] = $subject;
        $i++;
    }
}

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


$cmq = "SELECT * FROM marks WHERE id='$id'";
$cmr = mysqli_query($link, $cmq);

while($cmd = mysqli_fetch_assoc($cmr)){
   $cSubject = $cmd['subject'];
   $cMonth = $cmd['month'];
   $cDay = $cmd['day'];
   $cMark = $cmd['mark'];
   $cType = $cmd['type'];
}

$lt = array('Sausis', 'Vasaris', 'Kovas', 'Balandis', 'Gegužė', 'Birželis', 'Liepa', 'Rugpjūtis', 'Rugsėjis', 'Spalis', 'Lapkritis', 'Gruodis');
$types = array('Kontrolinis darbas', 'Savarankiškas darbas', 'Klasės darbas', 'Kaupiamasis', 'Praktinis darbas', 'Namų darbai', 'Įskaita');


echo '<div id="myModal" style="position: absolute; height: 580px; width: 400px;" tabindex="-1" role="dialog" class="modal show ui-dialog ui-corner-all ui-widget ui-widget-content ui-front no-close2" aria-describedby="modal_dialog_window" aria-labelledby="ui-id-2"><div class="ui-dialog-titlebar ui-corner-all ui-widget-header ui-helper-clearfix ui-draggable-handle"><span id="ui-id-2" class="ui-dialog-title">Pažymio informacija</span><button type="button" class="c_btn secondary right" id="closeModalBtn" style="margin-right: 5px;"><i class="fa fa-icon fa-close fa-2x"></i></button></div><div id="modal_dialog_window" class="ui-dialog-content ui-widget-content" style="z-index: 9999; width: auto; min-height: 97px; max-height: none; height: auto;">

    <div class="page_header">
        <h4>
            Keisti pažymį
        </h4>
    </div>
    
    <div style="margin: 10px 0 10px 0;">
       <div>
          <label><b>Dabartinis pažymys</b></label>
       </div>     
    </div>
        
        <div class="col-md">
                <table class="dienynas" >
                   <thead><tr>
                      <td style="width: 50px;">Mėnuo</td>
                      <td style="width: 50px;">Diena</td>
                      <td style="width: 120px;">Dalykas</td>
                      <td style="width: 50px;">Pažymys</td>
                      <td style="width: 50px;">Tipas</td>
                   </tr></thead>
                   <tbody id="marks_content">
                      <td>'.$lt[$cMonth-1].'</td>
                      <td>'.$cDay.'</td>
                      <td>'.$subjects[$cSubject].'</td>
                      <td>'.$cMark.'</td>
                      <td><span class="fa fa-circle '.markType($cType).'" style="vertical-align:middle;font-weight:bold;font-size:10px;padding-left:2px;margin-top:-2px"></span></td>
                   </tbody>
                </table>
             </div>
          
          
    <div style="margin: 10px 0 10px 0;">
       <div>
          <label><b>Naujas pažymys</b></label>
       </div>     
    </div>
    
    <div class="col-md-8">
                                   <div class="row">
                          <div class="col-md-6 d-flex flex-column">
                             <div class="d-flex flex-column">
                                  <input type="hidden" value="'.$id.'" name="id" id="markid" />
                                      <label>Mėnuo</label>
                                  <div class="p-2">
                                      
                                      <select class="p-2" name="month" id="cmonth">';
                                              $i = 1;  
                                              foreach($lt as $month){
                                                  echo '<option value="'.$i.'">'.ucfirst($month).'</option>';
                                                  $i++;
                                              } echo '
                                      </select>
                                  </div>
                                  <label>Diena</label>
                                  <div class="p-2">
                                          
                                          <select class="p-2" name="day" id="cday">'; 
                                                  for($i = 1; $i <= 31; $i++){
                                                      echo '<option value="'.$i.'">'.$i.'</option>';
                                                  }echo '
                                          </select>
                                  </div>
                                  <label>Dalykas</label>
                                  <div class="p-2">
                                         
                                          <select class="p-2" name="subject" id="csubject">';
              
                                              $i = 0; 
                                              foreach($subjects as $subject){
                                                  echo '<option value="'.$i.'">'.$subject.'</option>';
                                                  $i++;
                                              } echo '
                                          </select>
                                  </div>
                                  <label >Pažymys</label>
                                  <div class="p-2">
                                      
                                      <select class="p-2" name="mark" id="cmark">';
                                              for($i = 10; $i >= 0; $i--){
                                                  if($i == 0){
                                                     echo '<option value="'.$i.'">įsk.</option>';
                                                  }
                                                  else{
                                                     echo '<option value="'.$i.'">'.$i.'</option>';
                                                  }
                                              } echo '
                                      </select>
                                  </div>
                                  <label >Tipas</label>
                                  <div class="p-2">
                                          
                                          <select class="p-2" name="type" id="ctype">';
                                                  $i = 0; 
                                                  foreach($types as $type){
                                                      echo '<option value="'.$i.'">'.$type.'</option>';
                                                      $i++;
                                                  }echo '
                                          </select>
                                  </div>
                                  
                                  <button class="p-2 c_btn submit " onclick="updateMark();" name="submit" id="editButton"><a style="color: #fff;">Įrašyti</a></button>
                              </div>
                          </div>
                        </div>
                      </div> 

<div class="right">
    <!-- <a class="btn c_btn" id="closeModalBtn"><span>Uždaryti</span></a>-->
</div>
</div><div class="ui-resizable-handle ui-resizable-n" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-e" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-w" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-sw" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-ne" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-nw" style="z-index: 90;"></div></div>';
?>