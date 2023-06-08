<?php
function getMap(){

    return [
    
        [true,true,true,true,true],
        [true,false,false,false,true],
        [true,true,true,true,true],
        [true,true,true,true,true],
        [true,true,true,true,true]

    ];

}

function pathfind($map, $start, $end){

    pre([$map, $start, $end]);

    //Remove the empty rows with no blockers and no vectors

    

}

function pre($var){

    echo '<pre>';
    print_r($var);
    echo '</pre>';

}