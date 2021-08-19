<?php
function number_masking($num){
    $ano="$num";
    for($val=0 ; $val<strlen($ano) ; $val++) {
        if ($val>1 && $val<8){
            $ano[$val]="*";
        }
    }
    return $ano;
}

$num=9486400668;
print_r(number_masking($num));
