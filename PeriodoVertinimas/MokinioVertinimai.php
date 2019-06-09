<?php 
        include_once "../partials/header.php";
        include_once "../partials/menu.php";
?>

<div id="c_main">
            
            <div class="page_header">
                <div class="row">
                    <div class="col-md-10"><h3>MOKINIO LAIKOTARPIO VERTINIMAI</h3>
                            <div class="header_description">
2 pusmetis, 2019-01-26 - 2019-06-21        </div>
                    </div>
                </div>
            </div> 
            <div class="c_block options">
    <label>Laikotarpis</label>
<select id="laikotarpis" name="laikotarpis"><option value="1">1 pusmetis</option>
<option selected="selected" value="2">2 pusmetis</option>
<option value="3">Metinis</option>
</select></div>

<div class="c_block padLess borderless">
    <div class="c_table_container">
        <table class="c_main_table wrap_text left" style="width: 200px;">
            <colgroup>
                <col class="fixed" width="200">
                
                
                    
            </colgroup>
            <thead class="grey bold">
                <tr style="height: 43px;">
                    <th class="fixed">Dalykas / mokytojas</th>
                    
                    
                        
                </tr>
            </thead>
            <tbody id="st-response">
                    
            </tbody>
        </table>
        <div class="left slider_holder" id="slenkanti_dalis" style="width: 565px; height: 884px;"><table class="c_main_table wrap_text left">
            <colgroup>
                
                <col width="600">
                <col width="50">
                    <col width="50">
            </colgroup>
            <thead class="grey bold">
                <tr style="height: 43px;">
                    
                    <th>Pažymiai</th>
                    <th>Vidurkis</th>
                        <th>Pagr.</th>
                </tr>
            </thead>
            <tbody id="table-response">
                    
            </tbody>
        </table></div><br class="clear">
    </div>
</div> 
</div>
</div>
</div>

<?php 
        include_once "../partials/footer.php";
?>

<script>

        
        let loadST = () => {
        
                let url = "../API/loadST.php";
                
                $.get({
                     url: url   
                })
                .done(function(data){
                        $("#st-response").html(data);
                })
        }
        
        let loadTable = (id) => {
           
           let url = "../API/loadPeriodTable.php";
           let data = {id: id};
           
           $.post({
              
              url: url,
              data: data
           })
           .done(function(data){
              $("#table-response").html(data);
           });
        }
        
        $("#laikotarpis").change(function(){
           let id = $("#laikotarpis").val();
           loadTable(id);
        });
        
        $(document).ready(function(){
                loadST();
                loadTable(2);
        });
        
</script>