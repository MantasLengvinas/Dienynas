<?php

function updatePeriod($link, $period, $subject, $avg){
   switch($period){
      case 1:
         $query = "UPDATE periods SET first_period='$avg' WHERE subject='$subject'";
         
         mysqli_query($link, $query);
      break;
      case 2: 
         $query = "UPDATE periods SET second_period='$avg' WHERE subject='$subject'";
         
         mysqli_query($link, $query);
      break;
   }
}

?>