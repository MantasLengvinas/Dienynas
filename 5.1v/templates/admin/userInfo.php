<div id="myModal" style="position: absolute; height: 580px; width: 400px;" tabindex="-1" role="dialog" class="modal show ui-dialog ui-corner-all ui-widget ui-widget-content ui-front no-close2" aria-describedby="modal_dialog_window" aria-labelledby="ui-id-2"><div class="ui-dialog-titlebar ui-corner-all ui-widget-header ui-helper-clearfix ui-draggable-handle"><span id="ui-id-2" class="ui-dialog-title">Išsami informacija</span><button type="button" class="c_btn secondary right" id="closeModalBtn" style="margin-right: 5px;"><i class="fa fa-icon fa-close fa-2x"></i></button></div><div id="modal_dialog_window" class="ui-dialog-content ui-widget-content" style="z-index: 9999; width: auto; min-height: 97px; max-height: none; height: auto;">

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
                <td style="width: 120px;">Privilegijos</td>
            </tr></thead>
            <tbody>
                <tr>
                    <td><?=$data[0]->username?></td>
                    <td><?=$data[0]->school?></td>
                    <td><?=$data[0]->role?></td>
                </tr>    
            </tbody>
        </table>
    </div>
          
          
    <div style="margin: 10px 0 10px 0;">
       <div style="height: 15px;">
          <label style="float: left;"><b>Pažymiai</b></label>
       </div>     
    </div>
    
    <div class="col-lg-10" style="height: 150px; overflow-y: scroll;">
        <table class="dienynas" >
            <thead><tr>
                <td style="width: 120px;">Dalykas</td>
                <td style="width: 80px;">Metai</td>
                <td style="width: 80px;">Mėnuo</td>
                <td style="width: 80px;">Diena</td>
                <td style="width: 80px;">Pažymys</td>
                <td style="width: 80px;">Tipas</td>
            </tr></thead>
            <tbody>
                <?php foreach($data[1] as $mark): ?>
                    <tr>
                        <td><?=$mark->subject?></td>
                        <td><?=$mark->year?></td>
                        <td><?=$mark->month?></td>
                        <td><?=$mark->day?></td>
                        <td><?=$mark->mark?></td>
                        <td><?=$mark->type?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div style="margin: 10px 0 10px 0;">
       <div style="height: 15px;">
          <label style="float: left;"><b>Dalykai</b></label>
       </div>     
    </div>

<div class="right">
    <!-- <a class="btn c_btn" id="closeModalBtn"><span>Uždaryti</span></a>-->
</div>
</div><div class="ui-resizable-handle ui-resizable-n" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-e" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-w" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-sw" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-ne" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-nw" style="z-index: 90;"></div></div>