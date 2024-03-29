<?php 
    $marks = $data[1];
    $subjects = $data[2]
?>

<div id="myModal" style="position: absolute; height: <?=$height?>px; width: 400px;" tabindex="-1" role="dialog" class="modal show ui-dialog ui-corner-all ui-widget ui-widget-content ui-front no-close2" aria-describedby="modal_dialog_window" aria-labelledby="ui-id-2"><div class="ui-dialog-titlebar ui-corner-all ui-widget-header ui-helper-clearfix ui-draggable-handle"><span id="ui-id-2" class="ui-dialog-title">Išsami informacija</span><button type="button" class="c_btn secondary right" id="closeModalBtn" style="margin-right: 5px;"><i class="fa fa-icon fa-close fa-2x"></i></button></div><div id="modal_dialog_window" class="ui-dialog-content ui-widget-content" style="z-index: 9999; width: auto; min-height: 97px; max-height: none; height: auto;">

    <div class="page_header">
        <h4>
            <?=$data[0]->firstname.' '.$data[0]->lastname?>
        </h4>
    </div>
    
    <div style="margin: 10px 0 10px 0;">
       <div style="height: 15px;">
          <label style="float: left;"><b>Informacija</b></label>
       </div>     
    </div>
        
    <div class="col-lg-10" >
        <table class="dienynas" >
            <thead><tr>
                <td style="width: 100px;">Vartotojo vardas</td>
                <td style="width: 200px;">Mokykla</td>
                <td style="width: 120px;">Statusas</td>
            </tr></thead>
            <tbody>
                <tr>
                    <td><?=$data[0]->username?></td>
                    <td><?=$data[0]->school?></td>
                    <td><?=$role?></td>
                </tr>    
            </tbody>
        </table>
    </div>
          
    <?php if(sizeof($data[2]) == 0){
        echo '<div style="margin: 10px 0 10px 0;">
                <div style="height: 15px;">
                    <label style=""><b>Šis vartotojas neturi mokomųjų dalykų!</b></label>
                </div>     
             </div>';
    }else{
        echo '<div style="margin: 10px 0 10px 0;">
        <div style="height: 15px;">
           <label style="float: left;"><b>Dalykai ('.sizeof($subjects).')</b></label>
        </div>     
     </div>
 
     <div class="col-lg-10" style="height: 150px; overflow-y: auto;">
         <table class="dienynas" >
             <thead><tr>
                 <td style="width: 200px;">Dalykas</td>
                 <td style="width: 200px;">Mokytojas</td>
             </tr></thead>
             <tbody>
                 ';foreach($data[2] as $subj){ echo'
                     <tr>
                         <td>'.$subj->subject.'</td>
                         <td>'.$subj->teacher.'</td>
                     </tr>';} echo'
             </tbody>
         </table>
     </div>';
    } ?>
    <?php if(sizeof($data[1]) == 0){
        echo '<div style="margin: 10px 0 10px 0;">
                <div style="height: 15px;">
                    <label style=""><b>Šis vartotojas neturi pažymių!</b></label>
                </div>     
             </div>';
    }else {?>
    <div style="margin: 10px 0 10px 0;">
       <div style="height: 15px;">
          <label style="float: left;"><b>Pažymiai (<?=sizeof($marks)?>)</b></label>
       </div>     
    </div>
    
    <div class="col-lg-10" style="z-index:2;" id="">

    <!-- <div class=" " style="z-index:2;" id="">

        <table class="dienynas" style="position: absolute; z-index: 3;">
            <thead><tr>
                <td style="width: 121px;">Dalykas</td>
                <td style="width: 36px;">Metai</td>
                <td style="width: 44px;">Mėnuo</td>
                <td style="width: 37px;">Diena</td>
                <td style="width: 55px;">Pažymys</td>
                <td style="width: 35px;">Tipas</td>
            </tr></thead>
        </table>
    </div>     -->

        <div style="height: 150px; overflow-y: auto; z-index:1">

            <table class="dienynas">
                <thead><tr>
                    <td style="width: 121px;">Dalykas</td>
                    <td style="width: 40;">Metai</td>
                    <td style="width: 47px;">Mėnuo</td>
                    <td style="width: 40px;">Diena</td>
                    <td style="width: 57px;">Pažymys</td>
                    <td style="width: 38px;">Tipas</td>
                </tr></thead>
                <tbody>
                    <?php foreach($data[1] as $mark): ?>
                        <tr>
                            <td><?=$mark->subject?></td>
                            <td><?=$mark->year?></td>
                            <td><?=$mark->month?></td>
                            <td><?=$mark->day?></td>
                            <td><?=$mark->mark?></td>
                            <td><?php echo '<div style="padding:0;margin:0;vertical-align:middle"><span class="fa fa-circle '.$mark->type.'" style="vertical-align:middle;font-weight:bold;font-size:10px;padding-left:2px;margin-top:-2px"></span></div>';?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php }?>
    </div>


<div class="right" style="margin: 20px 0 0 0;">
    <a class="btn c_btn" onclick="deleteUser('<?=$data[0]->username?>');"><span>Ištrinti vartotoją</span></a>
</div>
    </div><div class="ui-resizable-handle ui-resizable-n" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-e" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-w" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-sw" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-ne" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-nw" style="z-index: 90;"></div></div>