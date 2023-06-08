<?php
/**
 * Dont forget to run the PHP server on 0.0.0.0:8000
 */

/**
 * Define functions in a seperate file to keep primary file clean and easy to read. 
 */
include 'functions.php';

/**
 * Submit vectors to the map and find the shortest distance.
 */
echo pathfind(
    
    //Define the map array
    getMap(), 

    //The starting venctor
    [0,1], 

    //The finish vector
    [3,3]

);

