<?php 
    include_once '../inc/header.php';
    include_once '../inc/menu.php';
?>

<!-- Body section -->


<div id="c_main">

    <div class="page_header">
        <h3 id="admin_page_header">Vertinimas</h3>
        <div class="header_description" id="header_description">

        </div>
    </div>

    <div class="page_content">

        <div class="row">
            <div class="col-md-14 d-flex" style="position:relative;" id="admin_content">
<div class="row">

    <div class="row">
        <div class="col-md-14">
            <div class="d-flex flex-column" style="margin: 0 0 0 10px;">

                <label>Mokinys</label>
                <div class="p-2">

                    <select class="p-2" name="student" id="student" onchange="loadMarksContent();">
                        <?php 
                                foreach($students as $student){
                                    echo '<option value="'.$student->username.'">'.$student->firstname.' '.$student->lastname.'</option>';
                                }
                            ?>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-row">
        <div class="col-md-6 d-flex flex-column">
            <div style="margin: 10px 0 20px 0;">
                <div style="height: 15px;">
                    <label style="float: left;"><b>Įrašyti pažymį</b></label>
                </div>
            </div>
            <div class="d-flex flex-column" id="prepareMark-response">

            </div>

            <div id="uploadmark-response">

            </div>
        </div>


        <div class="d-flex flex-row">
            <div class="col-md-8 d-flex flex-column">
                <div style="margin: 10px 0 20px 0;">
                    <div style="height: 15px;">
                        <label style="float: left;"><b>Mokinio pažymiai</b></label>
                    </div>
                </div>
                <div class="d-flex flex-column" id="showmarks-response" style="max-height: 370px; overflow-y: scroll;">
                    
                </div>
            </div>
        </div>
             </div>
        </div>
    </div>
</div>

<!-- Loading scripts -->
<script>
    $(document).ready(function () {
        loadMarksContent();        
    })
</script>

<?php include_once '../inc/footer.php';?>