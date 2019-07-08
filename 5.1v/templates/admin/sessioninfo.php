
<div id="myModal" style="position: absolute; height: 400px; width: 400px;" tabindex="-1" role="dialog" class="modal show ui-dialog ui-corner-all ui-widget ui-widget-content ui-front no-close2" aria-describedby="modal_dialog_window" aria-labelledby="ui-id-2"><div class="ui-dialog-titlebar ui-corner-all ui-widget-header ui-helper-clearfix ui-draggable-handle"><span id="ui-id-2" class="ui-dialog-title">Išsami informacija</span><button type="button" class="c_btn secondary right" id="closeModalBtn" style="margin-right: 5px;"><i class="fa fa-icon fa-close fa-2x"></i></button></div><div id="modal_dialog_window" class="ui-dialog-content ui-widget-content" style="z-index: 9999; width: auto; min-height: 97px; max-height: none; height: auto;">

    <div class="page_header">
        <h4>
            <?=$user->firstname.' '.$user->lastname.' '?><i style="font-size: 13px;">(<?=$role?>)</i>
        </h4>
    </div>
    
    <div style="margin: 10px 0 10px 0;">
       <div style="height: 15px;">
          <label style="float: left;"><b>Prisijungimo informacija</b></label>
       </div>     
    </div>
        
    <div class="col-lg-10" >
        <table class="dienynas" >
            <thead><tr>
                <td style="width: 250px;">Prisijungta</td>
                <td style="width: 250px;">Pašalinimas</td>
            </tr></thead>
            <tbody>
                <tr>
                    <td><?=$selected->timestamp?></td>
                    <td><?=$selected->delete_at?></td>
                </tr>    
            </tbody>
        </table>
    </div>

    <div style="margin: 10px 0 10px 0;">
       <div style="height: 15px;">
          <label style="float: left;"><b>Informacija pagal IP adresą</b></label>
       </div>     
    </div>

    <div class="col-lg-10">
        <ul style="font-size: 14px; line-height: 30px;">
            <li><b>IP: </b> <i><?=$data->ip?></i></li>
            <li><b>Tipas: </b> <i><?=$data->type?></i></li>
            <li><b>Šalis: </b> <i><?=$data->country_name?></i></li>
            <li><b>Miestas: </b> <i><?=$data->city?></i></li>
        </ul>
    </div>
          
    
    </div><div class="ui-resizable-handle ui-resizable-n" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-e" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-w" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-sw" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-ne" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-nw" style="z-index: 90;"></div></div>