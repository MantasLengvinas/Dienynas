
<div class="row">
                    <div class="col-md-6 d-flex flex-column">
                    <div style="margin: 10px 0 20px 0;">
       <div style="height: 15px;">
          <label style="float: left;"><b>Įrašyti pažymį</b></label>
       </div>     
    </div>
    <div class="d-flex flex-column">

    <label>Pasirinkite mokinį</label>
        <div class="p-2">
            
            <select class="p-2" name="student" id="student" onchange="prepareMark();">
                <?php 
                    foreach($students as $student){
                        echo '<option value="'.$student->username.'">'.$student->firstname.' '.$student->lastname.'</option>';
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="d-flex flex-column" id="prepareMark-response">

    </div>
                                
<div id="uploadmark-response">
    
</div>

<script>
    $(document).ready(function(){
        prepareMark();
    })
</script>
