
<input type="hidden" id="sessionID" value="<?=$selected->ip?>">

<script>
    var access_key = '9d5ff06b30c75b12a4baf0fbdf0b1304';
    var ip = $("#sessionID").val();
    
$.ajax({
    url: `http://api.ipapi.com/${ip}?access_key=${access_key}`,   
    dataType: 'jsonp',
    success: function(data) {
        $("#session_ip").html(data.ip);
        $("#session_type").html(data.type);
        $("#session_country").html(data.country_name);
        $("#session_city").html(data.city);
        $("#session_zip").html(data.zip);
        $("#session_longitude").html(data.longitude);
        $("#session_latitude").html(data.latitude);
    }
});


</script>

<div id="myModal" style="position: absolute; height: 470px; width: 400px;" tabindex="-1" role="dialog" class="modal show ui-dialog ui-corner-all ui-widget ui-widget-content ui-front no-close2" aria-describedby="modal_dialog_window" aria-labelledby="ui-id-2"><div class="ui-dialog-titlebar ui-corner-all ui-widget-header ui-helper-clearfix ui-draggable-handle"><span id="ui-id-2" class="ui-dialog-title">Išsami informacija</span><button type="button" class="c_btn secondary right" id="closeModalBtn" style="margin-right: 5px;"><i class="fa fa-icon fa-close fa-2x"></i></button></div><div id="modal_dialog_window" class="ui-dialog-content ui-widget-content" style="z-index: 9999; width: auto; min-height: 97px; max-height: none; height: auto;">

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
            <li><b>IP: </b> <i id="session_ip"></i></li>
            <li><b>Tipas: </b> <i id="session_type"></i></li>
            <li><b>Šalis: </b> <i id="session_country"></i></li>
            <li><b>Miestas: </b> <i id="session_city"></i></li>
            <li><b>Pašto kodas: </b> <i id="session_zip"></i></li>
            <li><b>Ilguma: </b> <i id="session_longitude"></i></li>
            <li><b>Platuma: </b> <i id="session_latitude"></i></li>
        </ul>
    </div>
          
    
    </div><div class="ui-resizable-handle ui-resizable-n" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-e" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-w" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-sw" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-ne" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-nw" style="z-index: 90;"></div></div>