<?php
    $info = getdate();
    $day = $info['mday'];
    $month = $info['mon'];
    $year = $info['year'];
    $hour = $info['hours'];
    $min = $info['minutes'];
    $sec = $info['seconds'];
    echo $day.'/'.$month.'/'.$year.' - '.$hour.':'.$min.':'.$sec;
?>