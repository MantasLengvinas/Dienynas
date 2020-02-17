<div class="row" style="margin: 10px;">
    <div class="col-lg-10" style="height: auto; overflow-y: auto;">
        <label>Duomenų bazės kopija</label>
        <div class="p-2">
            <select class="p-2" name="db" id="database">
                <?php 
                    foreach($dbs as $db){
                        echo '<option value="'.$db.'">'.$db.'</option>';
                    }
                ?>
            </select>
        </div>
        <ul style="display: inline-block;">
            <li style="margin: 5px;">
                <button class="p-2 c_btn submit " name="submit" onclick="downloadSQL();"><a style="color: #fff;">Atsisiųsti pasirinktą duomenų bazę</a></button>
            </li>
            <li style="margin: 5px;">
                <button class="p-2 c_btn submit " name="submit" onclick="exportDB();"><a style="color: #fff;">Kurti atsarginę duomenų bazės kopiją</a></button>
            </li>
        </ul>
    </div>
    <div class="col-lg-10" style="height: auto; overflow-y: auto;" id="sql_view">
        
    </div>
</div>

<script>
    $('#database').change(() => {
        showSQL();
    })
</script>