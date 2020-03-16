<?php 
    include_once '../inc/header.php';
    include_once '../inc/menu.php';
?>

<!-- Body section -->


<div id="c_main">

    <div class="page_header">
        <h3 id="admin_page_header">Prisijungimai prie sistemos</h3>
        <div class="header_description" id="header_description">

        </div>
    </div>

    <div class="page_content">

        <div class="row">
            <div class="col-md-14 d-flex" style="position:relative;" id="admin_content">
            <div class="row">
<div style="margin: 10px 0 10px 10px;">
       <div style="height: 15px;">
          <label style="float: left;"><b>Prisijungimai</b></label>
       </div>     
    </div>
    <div class="col-lg-10" style="height: auto; max-height: 350px; overflow-y: auto;">
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
            </div>
        </div>
    </div>
</div>

<!-- Loading scripts -->
<script>

</script>

<?php include_once '../inc/footer.php';?>
