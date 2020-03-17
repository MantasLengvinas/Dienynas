<?php 
    include_once '../inc/header.php';
    include_once '../inc/menu.php';
?>

<!-- Body section -->


<div id="c_main">

    <div class="page_header">
        <h3 id="admin_page_header">Mokinio pažangos analitika</h3>
        <div class="header_description" id="header_description">

        </div>
    </div>

    <div class="page_content">

        <div class="row">
            <div class="col-md-14 d-flex" style="position:relative;" id="admin_content">


                <div class="row">
                    <div class="d-flex flex-row">
                        <div class="col-md-4 d-flex flex-column" style="margin: 0 10px 0 10px;">
                            <label>Mokinys</label>
                            <div class="p-2">

                                <select class="p-2" name="student" id="student" onchange="loadAnalitics();">
                                    <?php 
                            foreach($students as $student){
                                echo '<option value="'.$student->username.'">'.$student->firstname.' '.$student->lastname.'</option>';
                            }
                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex flex-column" style="margin: 0 10px 0 10px;">
                            <label>Laikotarpis</label>
                            <div class="p-2">
                                <select class="p-2" name="period" id="period" onchange="loadAnalitics();">
                                    <option value="">Nuo mokslo metų pradžios</option>
                                    <!-- <option value="">Šis pusmetis</option>
                                    <option value="">Šis mėnuo</option>
                                    <option value="">Ši savaitė</option> -->
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" id="analitics-response">
                    
                </div>


            </div>
        </div>
    </div>
</div>

<!-- Loading scripts -->
<script>

    $(document).ready(function () {
        loadAnalitics();        
    })

</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>


<?php include_once '../inc/footer.php';?>