<?php if($period !== '0') :?>


<table class="c_main_table wrap_text left" style="width: 200px;">
            <colgroup>
                <col class="fixed" width="200">
                
                
                    
            </colgroup>
            <thead class="grey bold">
                <tr style="height: 43px;">
                    <th class="fixed">Dalykas / mokytojas</th>
                    
                    
                        
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($subjects as $subject){
                        echo '                        <tr style="height: auto;">
                        <td class="fixed">
                            <div style="font-size:1.05em;font-weight:bold;">'.$subject->subject.'</div>
                                <div style="font-size:0.9em;">'.$subject->teacher.'</div>

                        </td>      
                    </tr>';
                    }

                    echo ' <tr style="background: rgb(238, 238, 238) none repeat scroll 0% 0%; height: 48px;">
                    <td class="fixed" style="padding-top:10px;padding-bottom:10px;"><div style="font-weight:bold;font-size:20px">Vidurkis:</div></td>  
                </tr>';
                ?>
            </tbody>
        </table>
        <div class="left slider_holder" id="slenkanti_dalis" style="width: 565px; height: auto;"><table class="c_main_table wrap_text left">
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
            <tbody>
                    
                    <?php 

                        $i = 0;
                        foreach($subjects as $subject){
                            echo '<tr style="height: '.$p->rowHeight($subject->subject).'px;">
                        
                            <td>';
                                $marks = $p->loadPeriodMarks($period, $i, $_SESSION['username']);
                                foreach($marks as $mark){
                                    echo '<div style="text-align:center;cursor:pointer;font-size:15px;display:inline-block;vertical-align:top;margin-right:10px;font-weight:normal;">
                                    <span class=" ">
                                        '.$mark->mark.'
                                    </span>
                                    </div>';
                                }
                            echo '</td>
                            <td class="a_center" style="font-size:15px">
    
    
                                <span>';if($p->subjectAvg($period, $i, $_SESSION['username']) != 0){
                                    echo $p->subjectAvg($period, $i, $_SESSION['username']);
                                }
                                else{
                                    echo ' ';
                                } echo '</span>
    
    
                            </td>
                                    <td class="a_center"><span style="font-weight:bold;font-size:15px">'.$p->roundedAvg($period, $i, $_SESSION['username']).'</span></td>
                        </tr>';
                            $i++;
                        }
                    ?>
                    
                <tr style="background: rgb(238, 238, 238) none repeat scroll 0% 0%; height: 48px;">
                    
                    <td style="padding-top:10px;padding-bottom:10px;">
                            <span style="font-weight:bold;font-size:20px"><?=$period?></span>
                    </td>
                    <td></td>

                        <td class="a_center" style="padding-top:10px;padding-bottom:10px;">
                                <span style="font-weight:bold;font-size:20px"><?=$period?></span>

                        </td>
                </tr>
            </tbody>
        </table></div><br class="clear">

<?php endif; ?>

<?php if($period === '0') :?>

<div class="c_table_container">
        <table class="c_main_table wrap_text left" style="width: 200px;">
            <colgroup>
                <col class="fixed right_border" width="200">
                        
                        
                        
            </colgroup>
            <thead class="grey bold">
                <tr style="height: 43px;">
                    <th class="fixed right_border"></th>
                        
                        
                        
                </tr>
            </thead>
            <thead class="grey bold">
                <tr style="height: 43px;">
                    <th class="fixed right_border">Dalykas / mokytojas</th>
                            
                            
                            
                </tr>
            </thead>
            <tbody>
                    <tr style="height: 48px;">
                        <td class="fixed">
                            <div style="font-size:1.05em;font-weight:bold;">Bendroji kūno kultūra</div>
                                <div style="font-size:0.9em;">Brazaitis Ričardas</div>

                        </td>
                                    
                                    
                                    
                    </tr>
                    <tr style="height: 48px;">
                        <td class="fixed">
                            <div style="font-size:1.05em;font-weight:bold;">Braižyba</div>
                                <div style="font-size:0.9em;">Stašaitienė Neringa</div>

                        </td>
                                    
                                    
                                    
                    </tr>
                    <tr style="height: 48px;">
                        <td class="fixed">
                            <div style="font-size:1.05em;font-weight:bold;">Brush Up Your English</div>
                                <div style="font-size:0.9em;">Liaudanskienė Virginija</div>

                        </td>
                                    
                                    
                                    
                    </tr>
                    <tr style="height: 48px;">
                        <td class="fixed">
                            <div style="font-size:1.05em;font-weight:bold;">Chemija</div>
                                <div style="font-size:0.9em;">Bartušienė Sigita</div>

                        </td>
                                    
                                    
                                    
                    </tr>
                    <tr style="height: 48px;">
                        <td class="fixed">
                            <div style="font-size:1.05em;font-weight:bold;">Dorinis ugdymas (tikyba)</div>
                                <div style="font-size:0.9em;">Tymalkienė Kristina</div>

                        </td>
                                    
                                    
                                    
                    </tr>
                    <tr style="height: 48px;">
                        <td class="fixed">
                            <div style="font-size:1.05em;font-weight:bold;">Fizika</div>
                                <div style="font-size:0.9em;">Digaitis Artūras</div>

                        </td>
                                    
                                    
                                    
                    </tr>
                    <tr style="height: 48px;">
                        <td class="fixed">
                            <div style="font-size:1.05em;font-weight:bold;">Geografija</div>
                                <div style="font-size:0.9em;">Jonikienė Danguolė</div>

                        </td>
                                    
                                    
                                    
                    </tr>
                    <tr style="height: 67px;">
                        <td class="fixed">
                            <div style="font-size:1.05em;font-weight:bold;">Informacinės technologijos (programavimas)</div>
                                <div style="font-size:0.9em;">Remeikienė Regina</div>

                        </td>
                                    
                                    
                                    
                    </tr>
                    <tr style="height: 48px;">
                        <td class="fixed">
                            <div style="font-size:1.05em;font-weight:bold;">Lietuvių kalba</div>
                                <div style="font-size:0.9em;">Jasevičiūtė Aristolda</div>

                        </td>
                                    
                                    
                                    
                    </tr>
                    <tr style="height: 48px;">
                        <td class="fixed">
                            <div style="font-size:1.05em;font-weight:bold;">Lietuvių kalba ir literatūra</div>
                                <div style="font-size:0.9em;">Jasevičiūtė Aristolda</div>

                        </td>
                                    
                                    
                                    
                    </tr>
                    <tr style="height: 64px;">
                        <td class="fixed">
                            <div style="font-size:1.05em;font-weight:bold;">Matematika</div>
                                <div style="font-size:0.9em;">Asačiovienė Emilija</div>
                                <div style="font-size:0.9em;">Rekašienė Asta</div>

                        </td>
                                    
                                    
                                    
                    </tr>
                    <tr style="height: 64px;">
                        <td class="fixed">
                            <div style="font-size:1.05em;font-weight:bold;">Matematiniai taikymai</div>
                                <div style="font-size:0.9em;">Asačiovienė Emilija</div>
                                <div style="font-size:0.9em;">Rekašienė Asta</div>

                        </td>
                                    
                                    
                                    
                    </tr>
                    <tr style="height: 48px;">
                        <td class="fixed">
                            <div style="font-size:1.05em;font-weight:bold;">Muzika</div>
                                <div style="font-size:0.9em;">Bartkienė Edita</div>

                        </td>
                                    
                                    
                                    
                    </tr>
                    <tr style="height: 48px;">
                        <td class="fixed">
                            <div style="font-size:1.05em;font-weight:bold;">Praktinė fizika</div>
                                <div style="font-size:0.9em;">Digaitis Artūras</div>

                        </td>
                                    
                                    
                                    
                    </tr>
                    <tr style="height: 48px;">
                        <td class="fixed">
                            <div style="font-size:1.05em;font-weight:bold;">Praktinis programavimas</div>
                                <div style="font-size:0.9em;">Remeikienė Regina</div>

                        </td>
                                    
                                    
                                    
                    </tr>
                    <tr style="height: 48px;">
                        <td class="fixed">
                            <div style="font-size:1.05em;font-weight:bold;">Užsienio kalba (anglų)</div>
                                <div style="font-size:0.9em;">Liaudanskienė Virginija</div>

                        </td>
                                    
                                    
                                    
                    </tr>
                <tr style="background: rgb(238, 238, 238) none repeat scroll 0% 0%; height: 48px;">
                    <td class="fixed" style="padding-top:10px;padding-bottom:10px;"><div style="font-weight:bold;font-size:20px">Vidurkis:</div></td>
                                
                                
                                


                </tr>
            </tbody>
        </table>
        <div class="left slider_holder" id="slenkanti_dalis" style="width: 565px; height: 959px;"><table class="c_main_table wrap_text left">
            <colgroup>
                
                        <col width="604 / 3">
                        <col width="604 / 3">
                        <col width="604 / 3">
            </colgroup>
            <thead class="grey bold">
                <tr style="height: 43px;">
                    
                        <th class="a_center right_border" colspan="1" title="1 pusmetis išvestas pažymys">
                            1 pusmetis
                        </th>
                        <th class="a_center right_border" colspan="1" title="2 pusmetis išvestas pažymys">
                            2 pusmetis
                        </th>
                        <th class="a_center right_border" colspan="1" title="Metinis išvestas pažymys">
                            Metinis
                        </th>
                </tr>
            </thead>
            <thead class="grey bold">
                <tr style="height: 43px;">
                    
                            <th class="right_border a_center"> Pagr.</th>
                            <th class="right_border a_center"> Pagr.</th>
                            <th class="right_border a_center"> Pagr.</th>
                </tr>
            </thead>
            <tbody>
                    <tr style="height: 48px;">
                        
                                    <td class="a_center" style="font-size:15px"><span>10</span></td>
                                    <td class="a_center" style="font-size:15px"><span>10</span></td>
                                    <td class="a_center" style="font-size:15px"><span>10</span></td>
                    </tr>
                    <tr style="height: 48px;">
                        
                                    <td class="a_center" style="font-size:15px"><span>10</span></td>
                                    <td class="a_center" style="font-size:15px"><span>10</span></td>
                                    <td class="a_center" style="font-size:15px"><span>10</span></td>
                    </tr>
                    <tr style="height: 48px;">
                        
                                    <td class="a_center" style="font-size:15px"><span>įsk.</span></td>
                                    <td class="a_center" style="font-size:15px"><span>įsk.</span></td>
                                    <td class="a_center" style="font-size:15px"><span>įsk.</span></td>
                    </tr>
                    <tr style="height: 48px;">
                        
                                    <td class="a_center" style="font-size:15px"><span>9</span></td>
                                    <td class="a_center" style="font-size:15px"><span>7</span></td>
                                    <td class="a_center" style="font-size:15px"><span>8</span></td>
                    </tr>
                    <tr style="height: 48px;">
                        
                                    <td class="a_center" style="font-size:15px"><span>įsk.</span></td>
                                    <td class="a_center" style="font-size:15px"><span>įsk.</span></td>
                                    <td class="a_center" style="font-size:15px"><span>įsk.</span></td>
                    </tr>
                    <tr style="height: 48px;">
                        
                                    <td class="a_center" style="font-size:15px"><span>9</span></td>
                                    <td class="a_center" style="font-size:15px"><span>8</span></td>
                                    <td class="a_center" style="font-size:15px"><span>9</span></td>
                    </tr>
                    <tr style="height: 48px;">
                        
                                    <td class="a_center" style="font-size:15px"><span>8</span></td>
                                    <td class="a_center" style="font-size:15px"><span>8</span></td>
                                    <td class="a_center" style="font-size:15px"><span>8</span></td>
                    </tr>
                    <tr style="height: 67px;">
                        
                                    <td class="a_center" style="font-size:15px"><span>10</span></td>
                                    <td class="a_center" style="font-size:15px"><span>10</span></td>
                                    <td class="a_center" style="font-size:15px"><span>10</span></td>
                    </tr>
                    <tr style="height: 48px;">
                        
                                    <td class="a_center" style="font-size:15px"><span>įsk.</span></td>
                                    <td class="a_center" style="font-size:15px"><span>įsk.</span></td>
                                    <td class="a_center" style="font-size:15px"><span>įsk.</span></td>
                    </tr>
                    <tr style="height: 48px;">
                        
                                    <td class="a_center" style="font-size:15px"><span>6</span></td>
                                    <td class="a_center" style="font-size:15px"><span>7</span></td>
                                    <td class="a_center" style="font-size:15px"><span>7</span></td>
                    </tr>
                    <tr style="height: 64px;">
                        
                                    <td class="a_center" style="font-size:15px"><span>7</span></td>
                                    <td class="a_center" style="font-size:15px"><span>7</span></td>
                                    <td class="a_center" style="font-size:15px"><span>7</span></td>
                    </tr>
                    <tr style="height: 64px;">
                        
                                    <td class="a_center" style="font-size:15px"><span>įsk.</span></td>
                                    <td class="a_center" style="font-size:15px"><span>įsk.</span></td>
                                    <td class="a_center" style="font-size:15px"><span>įsk.</span></td>
                    </tr>
                    <tr style="height: 48px;">
                        
                                    <td class="a_center" style="font-size:15px"><span>10</span></td>
                                    <td class="a_center" style="font-size:15px"><span>9</span></td>
                                    <td class="a_center" style="font-size:15px"><span>10</span></td>
                    </tr>
                    <tr style="height: 48px;">
                        
                                    <td class="a_center" style="font-size:15px"><span></span></td>
                                    <td class="a_center" style="font-size:15px"><span></span></td>
                                    <td class="a_center" style="font-size:15px"><span></span></td>
                    </tr>
                    <tr style="height: 48px;">
                        
                                    <td class="a_center" style="font-size:15px"><span>įsk.</span></td>
                                    <td class="a_center" style="font-size:15px"><span>įsk.</span></td>
                                    <td class="a_center" style="font-size:15px"><span>įsk.</span></td>
                    </tr>
                    <tr style="height: 48px;">
                        
                                    <td class="a_center" style="font-size:15px"><span>7</span></td>
                                    <td class="a_center" style="font-size:15px"><span>7</span></td>
                                    <td class="a_center" style="font-size:15px"><span>7</span></td>
                    </tr>
                <tr style="background: rgb(238, 238, 238) none repeat scroll 0% 0%; height: 48px;">
                    
                                <td class="a_center" style="padding-top:10px;padding-bottom:10px;">
                                    <span style="font-weight:bold;font-size:20px">8,6</span>
                                </td>
                                <td class="a_center" style="padding-top:10px;padding-bottom:10px;">
                                    <span style="font-weight:bold;font-size:20px">8,3</span>
                                </td>
                                <td class="a_center" style="padding-top:10px;padding-bottom:10px;">
                                    <span style="font-weight:bold;font-size:20px">8,6</span>
                                </td>


                </tr>
            </tbody>
        </table></div><br class="clear">
    </div>

<?php endif; ?>