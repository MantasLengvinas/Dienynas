<?php 
    include_once '../../../inc/header.php';
    include_once '../../../inc/menu.php';
?>

<!-- Body section -->
<div id="c_main">
            

<div class="page_header">
        <!--
    <div class="btn-group">
        <button type="button" class="btn">Grįžti atgal</button>
        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
        </ul>
    </div>
        -->
    <h3><?=$title?></h3>
        <div class="header_description">
            <!-- <?php//$description?> -->
        </div>
</div>
<div class="c_block options">
    <label>Laikotarpis</label>
<select id="laikotarpis" name="laikotarpis" onchange="loadPeriodTable();"><option selected="selected" value="1">1 pusmetis</option>
<option value="2">2 pusmetis</option>
<option value="0">Metinis</option>
</select></div>


<div class="c_block padLess borderless">
    <div class="c_table_container" id="periodtable-response">
        
    </div>
</div>
<h4>Pastabos</h4>
<ol>
    <li>Kontroliniai darbai išryškinti <span class="color_kontr bold">raudona spalva</span>.</li>
    <li>Papildoma informacija parodoma užvedus pelytės žymeklį ant konkretaus pažymio.</li>
</ol>
<h4>Trumpinių reikšmės</h4>

<div style="margin-bottom:10px;">


        <div><b>Pagr.</b> - Pagrindinis</div>
</div>


        </div>


        <script>
            $(document).ready(function(){
                loadPeriodTable();
            })
        </script>

<?php include_once '../../../inc/footer.php'; ?>