<!-- freegeoip.com -->


<div class="row">
    <div class="col-lg-10" style="height: auto; max-height: 250px; overflow-y: auto;">
    <div style="margin: 10px 0 10px 0;">
       <div style="height: 15px;">
          <label style="float: left;"><b>Prisijungimai</b></label>
       </div>     
    </div>
        <table class="dienynas" >
            <thead><tr>
                <td style="width: 196.25px;">Vartojo vardas</td>
                <td style="width: 196.25px;">IP adresas</td>
                <td style="width: 196.25px;">Prisijungta</td>
                <td style="width: 196.25px;">Pašalinimas</td>
            </tr></thead>
            <tbody id="marks_content">
            <?php foreach($sessions as $session){
                echo '<tr class="mark-holder" style="cursor: pointer;" onclick="sessionInfo('.$session->id.');">
                    <td>'.$session->username.'</td>
                    <td>'.$session->ip.'</td>
                    <td>'.$session->timestamp.'</td>
                    <td>'.$session->delete_at.'</td>
                </tr>';
            }?>
            </tbody>
        </table>
    </div>
</div>
<div id="sessionInfo-response">
    
</div>