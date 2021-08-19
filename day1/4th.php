<?php
function tasks_decoding($json){
    $all_players=json_decode($json,true)['players'];
    $names=[];
    $age=[];
    $city=[];
    foreach ($all_players as $player){
        array_push($names,$player['name']);
        array_push($age,$player['age']);
        array_push($city,$player['city']);
    }
    return [$names,$age,$city];
}


function GetAllDetails($final){
    print_r($final[0]);
    print_r($final[1]);
    print_r($final[2]);
}

function GetUniqueNames($names){
    print_r(array_unique($names));
}

function GetMaxAgedPlayers($names,$age){
    $nameAgeMap=[];
    $agedPersons=[];
    for ($i=0;$i<count($age);$i++){
        $nameAgeMap[$names[$i]]=$age[$i];
    }
    arsort($nameAgeMap);
    $maxAge=reset($nameAgeMap);
    array_push($agedPersons,key($maxAge));
    foreach($nameAgeMap as $players=>$players_age){

    }


}
$json = "{\"players\":[
    {
        \"name\":\"Ganguly\",
        \"age\":45,
        \"address\":{\"city\":\"Hyderabad\"}
    },
    {
        \"name\":\"Dravid\",
        \"age\":45,
        \"address\":{\"city\":\"Bangalore\"}
    },
    {
        \"name\":\"Dhoni\",
        \"age\":37,
        \"address\":{\"city\":\"Ranchi\"}
    },
    {
        \"name\":\"Virat\",
        \"age\":35,
        \"address\":{\"city\":\"Delhi\"}
    },
    {
        \"name\":\"Jadeja\",
        \"age\":35,
        \"address\":{\"city\":\"Hyderabad\"}
    },
    {
        \"name\":\"Jadeja\",
        \"age\":35,
        \"address\":{\"city\":\"Mumbai\"}
    }
    ]
}";
$final=tasks_decoding($json);
GetAllDetails($final);
GetUniqueNames($final[0]);
GetMaxAgedPlayers($final[0],$final[1]);