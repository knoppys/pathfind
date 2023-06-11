<?php
/**
 * Define the map
 */
function get_map(){

    return [
        '0,0' => true, '0,1' => true, '0,2' => true, '0,3' => true, '0,4' => true,
        '1,0' => true, '1,1' => false, '1,2' => false, '1,3' => false, '1,4' => true,
        '2,0' => true, '2,1' => true, '2,2' => true, '2,3' => true, '2,4' => true,
        '3,0' => true, '3,1' => true, '3,2' => true, '3,3' => true, '3,4' => true,
        '4,0' => true, '4,1' => true, '4,2' => true, '4,3' => true, '4,4' => true,
    ];

 
}

/**
 * Just a helper function to print vars
 */
function pre($var){

    echo '<pre>';
    print_r($var).'\n';
    echo '</pre>';

}

/**
 * Get the row index from the coords string
 */
function get_this_row($string){

    $array = explode(',',$string);

    return $array[1];

}

/**
 * Get the col index from the coords string
 */
function get_this_col($string){

    $array = explode(',',$string);    

    return $array[0];

}

/**
 * GEt the surrounding nodes and filter at those that are off the map or blocked by walls
 */
function filter_boundy_nodes($map, $current_row, $current_col){

    //From the current row and column, find the surrounding nodes. 
    $array1 = [];
    $surrounding_nodes = [
        'north'         => [$current_row - 1 , $current_col],
        'north_east'    => [$current_row - 1 , $current_col + 1],
        'east'          => [$current_col + 1 , $current_row],
        'south_east'    => [$current_row + 1 , $current_col + 1],
        'south'         => [$current_row + 1 , $current_col],
        'south_west'    => [$current_row + 1 , $current_col - 1],
        'west'          => [$current_col - 1 , $current_row],
        'north_west'    => [$current_row - 1 , $current_col - 1]
    ];

    foreach ($surrounding_nodes as $dir => $coords) {                
                        
            //Check for out of boundy nodes
            if(min($coords) < 0 || max($coords) > sqrt(count($map) - 1)){
                $array1[$dir] = ['false'];
            } else {
                $array1[$dir] = $coords;
            }   
               
    }   

    //Turn all these arrays back into a string. 
    $surrounding_nodes = [];
    foreach ($array1 as $direction => $cords) {
       $surrounding_nodes[$direction] = implode(',',$cords);
    }    

    //Check surronding nodes for blocks / walls in the grid
    foreach ($surrounding_nodes as $direction => $coord) {
        if(array_key_exists($coord, $map) && $map[$coord] == false){

            $surrounding_nodes[$direction] = 'false';

        }
    }

    return $surrounding_nodes;

}

/**
 * Get the closest valid column 
 */
function get_closest_col($surrounding_nodes, $current_col, $end_col){

    $col_distance = '';
    $available = [];

    
    foreach ($surrounding_nodes as $direction => $coords) {

        if($coords == 'false'){
           continue;
        }
        
        $distance_to_end = count(range(get_this_col($coords), $end_col )) - 1;
        pre([$direction => $distance_to_end]);
       

    }
    die(); 

}

function get_closest_row($surrounding_nodes, $current_row, $end_row){}