<?php
/**
 * Define functions in a seperate file to keep primary file clean and easy to read. 
 */
include 'functions.php';

/**
 * Submit vectors to the map and find the shortest distance.
 */
class KnpPathFind {

    function __construct($nodes, $start, $end){

        $this->nodes = $nodes;
        $this->start = $start;
        $this->end = $end;

        //Find the current start position and get the nodes around it
        $this->current_position = $start;
        $this->surrounding_nodes = $this->get_surrounding_nodes();

        //Search the surrounding nodes for the closest valid corrd to the end 
        $this->next_move = $this->get_next_move();

        /**
         * @todo
         * 
         * 1. Add the next positive move to the counter
         * 2. If the next move contains the end point then return the number of moves
         * 3. Else, loop back and find the next move
         */
       
    }

    public function get_surrounding_nodes(){

        $current_row = get_this_row($this->start);
        $current_col = get_this_col($this->start);
        $boundry_nodes = filter_boundy_nodes($this->nodes, $current_row, $current_col);             
        return $boundry_nodes;

    }

    public function get_next_move(){

        //Get the current coords as an array
        $current_row = get_this_row($this->current_position);
        $current_col = get_this_col($this->current_position);

        //Get the end coords
        $end_row = get_this_row($this->end);
        $end_col = get_this_col($this->end);
        
        //Find hte closest node to the end
        $closest_col = get_closest_col($this->surrounding_nodes, $current_col, $end_col);
        $closest_row = get_closest_row($this->surrounding_nodes, $current_row, $end_row);

        pre($end_row);
        pre($end_col);
        die();
    }


}
$response = new KnpPathFind(get_map(), '1,0', '2,3');

