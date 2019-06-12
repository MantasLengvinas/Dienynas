
<div class="row">
                    <div class="col-md-6 d-flex flex-column">
                    <div style="margin: 10px 0 10px 0;">
       <div style="height: 15px;">
          <label style="float: left;"><b>Įrašyti pažymį</b></label>
       </div>     
    </div>
    <div class="d-flex flex-column">

                        <label>Mokinys</label>
                            <div class="p-2">
                                
                                <select class="p-2" name="student" id="student" onchange="getUser();">
                                    <?php 
                                        foreach($students as $student){
                                            echo '<option value="'.$student->username.'">'.$student->firstname.' '.$student->lastname.'</option>';
                                            $i++;
                                        }
                                    ?>
                                </select>
                            </div>
                                <label>Mėnuo</label>
                            <div class="p-2">
                                
                                <select class="p-2" name="month" id="month">
                                    <?php
                                        $i = 1;  
                                        foreach($lt as $month){
                                            echo '<option value="'.$i.'">'.ucfirst($month).'</option>';
                                            $i++;
                                        }
                                    ?>
                                </select>
                            </div>
                            <label>Diena</label>
                            <div class="p-2">
                                    
                                    <select class="p-2" name="day" id="day">
                                        <?php 
                                            for($i = 1; $i <= 31; $i++){
                                                echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                        ?>
                                    </select>
                            </div>
                            <label>Dalykas</label>
                            <div class="p-2">
                                   
                                    <select class="p-2" name="subject" id="subject">
        
                                        <?php 
                                        $i = 0; 
                                        foreach($subjects as $subject){
                                            echo '<option value="'.$i.'">'.$subject.'</option>';
                                            $i++;
                                        }
                                        ?>
                                    </select>
                            </div>
                            <label >Pažymys</label>
                            <div class="p-2">
                                
                                <select class="p-2" name="mark" id="mark">
                                    <?php 
                                        for($i = 10; $i >= 0; $i--){
                                            if($i == 0){
                                               echo '<option value="'.$i.'">įsk.</option>';
                                            }
                                            else{
                                               echo '<option value="'.$i.'">'.$i.'</option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <label >Tipas</label>
                            <div class="p-2">
                                    
                                    <select class="p-2" name="type" id="type">
                                        <?php
                                            $i = 0; 
                                            foreach($markTypes as $type){
                                                echo '<option value="'.$i.'">'.$type.'</option>';
                                                $i++;
                                            }
                                        ?>
                                    </select>
                            </div>
                            
                            <button class="p-2 c_btn submit " name="submit" id="uploadButton"><a style="color: #fff;">Įrašyti</a></button>
                        </div>
                        <label id="response" style="margin: 20px 0;"></label>
                    </div>
<div id="moreInfo-response">
    
</div>

