                        <label>Metai</label>
                            <div class="p-2">
                                
                                <select class="p-2" name="year" id="year">
                                    <option value="0">-</option>
                                    <?php 
                                        foreach($years as $year){
                                            echo '<option value="'.$year.'">'.$year.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        <label>Mėnuo</label>
                            <div class="p-2">
                                
                                <select class="p-2" name="month" id="month">
                                    <?php
                                        $i = 0;  
                                        foreach($months as $month){
                                            if($i == 0){
                                                echo '<option value="'.$i.'">-</option>';
                                            }else{
                                                echo '<option value="'.$i.'">'.$month.'</option>';
                                            }
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
                                            echo '<option value="'.$i.'">'.$subject->subject.'</option>';
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
                            
                            <button class="p-2 c_btn submit " name="submit" id="uploadButton" onclick="uploadMark();"><a style="color: #fff;">Įrašyti</a></button>
                        </div>
                        
                    </div>
                    
                    <b><div id="modal-response" style="margin: 10px 0 0 0"></div></b>