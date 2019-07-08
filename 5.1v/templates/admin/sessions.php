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
                <td style="width: 157px;">Vartojo vardas</td>
                <td style="width: 157px;">IP adresas</td>
                <td style="width: 157px;">MAC adresas</td>
                <td style="width: 157px;">Prisijungimo laikas</td>
                <td style="width: 157px;">Pašalinimo laikas</td>
            </tr></thead>
            <tbody id="marks_content">
            <?php foreach($sessions as $session){
                echo '<tr class="mark-holder" style="cursor: pointer;">
                    <td>'.$session->username.'</td>
                    <td>'.$session->ip.'</td>
                    <td>'.$session->mac.'</td>
                    <td>'.$session->timestamp.'</td>
                    <td>'.$session->delete_at.'</td>
                </tr>';
            }?>
            </tbody>
        </table>
    </div>
</div>