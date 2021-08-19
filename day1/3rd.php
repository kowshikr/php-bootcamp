<?php

function ConvertToCamelCase($arr){
    for($i=0;$i<count($arr);$i++){
        $word=$arr[$i];
        $split_word=explode("_",$word);
        $final=$split_word[0];
        for ($j=1;$j<count($split_word);$j++){
           $final=$final."".ucwords($split_word[$j]);
        }
        $arr[$i]=$final;
    }
    return $arr;
}
$arr=["snake_case", "camel_case"];
print_r(ConvertToCamelCase($arr));
