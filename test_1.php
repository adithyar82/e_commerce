<?php 
  
// Input string 
$str  = "1049, 49th Street, Apt # 213, Norfolk, Virginia, 23508"; 
  
$hmaps_request = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=MedPLus++Kuvempu+Nagar+Hassan+Karnataka+573201+India&destinations=Lasso+Shop++2nd+Stage++Kuvempu+Nagar+Hassan+Karnataka+573201+India&key=AIzaSyDeb2feCGV_WQXXYX4Rk9GgApaS58jhU1g";
 $data = file_get_contents($hmaps_request);
 $data = json_decode($data);
    $time = 0;
    $distance = 0;
    foreach($data->rows[0]->elements as $road) {
        $time += $road->duration->text;
        $distance += $road->distance->text;
    }
    $distance_1=$distance;
    $table[1]=$time;
    $distance_1 = $distance_1 * 1.609;
    echo $distance_1;
    echo '<br>';
    echo $table[1];
?>