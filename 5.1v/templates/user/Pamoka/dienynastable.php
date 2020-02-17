<?php 
    $MO = new Mark;
?>

<div style="position:absolute;top:0;z-index:2;" id="">
    <table class="dienynas" id="">
        <thead>
            <tr><td class="dalykai"><?=$monthName?></td></tr>
        </thead>
        <tbody id="subj">
            <?php foreach($subjects as $sbj): ?>
                <tr><td class="dalykai"><?= $sbj->subject ?></td></tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <div id="scrollable_dienynas" style="overflow-x:scroll;position:relative;top:0;width:765px;z-index:1;padding-bottom:5px;">

    <table class="dienynas" style="width: 928px">
        <thead>
            <tr>
                <td class="dalykai"><?=$monthName?></td>
                <?php
                    if($startDay == 0){
                        $counter = 7;
                    }else{
                        $counter = $startDay;
                    }

                    for($i = 1; $i <= $daysNumber; $i++){
                        if($i == $today && $menuo == $thisMonth && $counter > 5){
                            echo '<td class="wday today weekend">'.$i.'<div style="color:inherit;font-size:0.8em;padding:0;margin:0">'.$dayName[$counter].'</div></td>';
                        }
                        else if($i == $today && $menuo == $thisMonth){
                            echo '<td class="wday today">'.$i.'<div style="color:inherit;font-size:0.8em;padding:0;margin:0">'.$dayName[$counter].'</div></td>';
                        }
                        else if($counter > 5){
                            echo '<td class="wday weekend">'.$i.'<div style="color:inherit;font-size:0.8em;padding:0;margin:0">'.$dayName[$counter].'</div></td>';
                        }
                        else{
                            echo '<td class="wday">'.$i.'<div style="color:inherit;font-size:0.8em;padding:0;margin:0">'.$dayName[$counter].'</div></td>';
                        }

                        if($counter == 7){
                            $counter = 0;
                        }
                    $counter++;
                    }
                echo ('</tr>
            </thead>
            <tbody>');
                $counter = $startDay;
                $subjectNumber = 0;
                $marks = array();
                foreach($subjects as $sbj){
                        echo '<tr><td class="dalykai">'.$sbj->subject.'</td>';
                        for($i = 1; $i <= $daysNumber; $i++){
                            $mark = $MO->searchMark($metai, $menuo, $i, $subjectNumber);
                            if($mark !== 0){
                                if(!in_array($mark, $marks)){
                                    array_push($marks, $mark);
                                    $r = time() - strtotime($mark->uploaded) >= 432000 ? ' ' : 'recent-mark';
                                    $v = $mark->mark == '0' ? 'įsk.' : $mark->mark;
                                    if($counter > 5){
                                        echo '<td class="weekend '.$r.'"><div style="padding:0;margin:0;vertical-align:middle">'.$v.'<span class="fa fa-circle '.$MO->typeColor($mark->type).'" style="vertical-align:middle;font-weight:bold;font-size:10px;padding-left:2px;margin-top:-2px"></span></div></td>';
                                    }
                                    else{
                                        echo '<td class="'.$r.'"><div style="padding:0;margin:0;vertical-align:middle">'.$v.'<span class="fa fa-circle '.$MO->typeColor($mark->type).'" style="vertical-align:middle;font-weight:bold;font-size:10px;padding-left:2px;margin-top:-2px"></span></div></td>';
                                    }
                                }
                            }
                            else{
                                if($counter > 5){
                                    echo '<td class="weekend"></td>';
                                }
                                else{
                                    echo '<td></td>';
                                }
                            }
                            if($counter >= 7){
                                $counter = 0;
                            }
                            if($i == $daysNumber){
                                $counter = $startDay - 1;
                            }
                            $counter++;
                        }
                        $subjectNumber++;
                        echo '</tr>';
                    }
            echo '</tbody>';