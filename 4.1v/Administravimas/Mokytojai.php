<?php 
    include_once "../partials/header.php";
    include_once "../partials/menu.php";
?>
    <div id="c_main">
            <div class="page_header">
                    <div class="row">
                        <div class="col-md-10"><h3>Mokytojų duomenys</h3></div>
                    </div>
            </div>
            <div class="page_content">
                <div class="row">
                        <div class="col-md-14">
                            <div class="selectors" style="margin:20px 0">
                                <div style="display:inline-block;padding:5px;font-weight:bold;" class="date_active"><a style="text-decoration:none;" href="javascript:void(0)">Mokytojų informacija</a></div>
                                <div style="display:inline-block;padding:5px;font-weight:bold;"><a style="text-decoration:none;" href="Pazymiai">Pažymiai</a></div>
                                <!--<div style="display:inline-block;padding:5px;font-weight:bold;" ><a style="text-decoration:none;" href="Vidurkiai">Vidurkiai</a></div> -->
                            </div>
                        </div>
                    </div> 
                <div class="row">
                    <div class="col-md-14">
                        <form action="Mokytojai.php" method="post">
                            <input type="text" name="m_vardas" placeholder="Mokytojas">
                            <input type="text" name="dalykas" placeholder="Dalykas">
                            <button class="c_btn submit " name="submit" type="submit"><a style="color: #fff;">Įrašyti</a></button>
                        </form>
                    </div>
                </div>
                <div class="row" style="margin: 20px 0;">
                    <div class="col-md-14" style="position:relative;text-align:center" id="teachers_content">

                    </div>
                </div>   
            </div>
            
    <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['submit'])) {
                    require '../API/uploadST.php';
                }
            }
?>
    </div>

<script>
    $(document).ready(function(){
        url = '../API/MokytojaiTable'
        $.ajax({
            type: 'POST',
            url: url
        })
        .done(function(data){
            $('#teachers_content').html(data);
        });
    });
</script>

<style>
    .header-td{
        width: 180px;
    }
</style>
</div></div>

<?php 
        include_once "../partials/footer.php";
?>