<?php
function flatten_array($arr){
    $final=[];
    foreach ($arr as $i){
        if (gettype($i)=='array')
        {
            foreach ($i as $val){
                array_push($final,$val);
            }
        }else{
            array_push($final,$i);
        }
    }
    return $final;
}

$arr=[2,
    3,
    [4,5],
    [6,7],
    8
    ];
print_r(flatten_array($arr));