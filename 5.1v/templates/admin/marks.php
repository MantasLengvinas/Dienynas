
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


<!-- <div class="d-flex flex-row">
            <div class="col-md-6 d-flex flex-column">
            <div style="margin: 10px 0 20px 0;">
       <div style="height: 15px;">
          <label style="float: left;"><b>Mokinio periodo vertinimai</b></label>
       </div>     
    </div>
    <div class="d-flex flex-column" id="periodData-response">

    </div>
                                
<div id="perioddata-response">
    
</div>
</div> -->

<script>
    $(document).ready(function(){
        loadMarksContent();
    })
</script>
