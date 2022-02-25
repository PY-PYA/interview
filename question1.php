<?php
$jsons = file_get_contents('php://input');

$jsons = json_decode($jsons,true);


date_default_timezone_set('Africa/Accra');
foreach($jsons as $key => $value){
    $day="{$key}:";
    $time='';
    if(isset($jsons[$key])){
        foreach($jsons[$key] as $v){
            //$time='';
            $open='';
            $close='';
            if(isset($v['type']) && $v['type']=='open')
            $open=''.date('g:i a',$v['value']);
 
            elseif(isset($v['type']) && $v['type']=='close')
            $close=''.date('g:i a',$v['value']);

            if($open)
            $time.="$open - ";
            else if($close)
            $time.="$close,";

     }
     $day=$day.$time;

    }
    if(!$time)
    $day=$day.'Closed';

    echo $day.'<br/>';
}