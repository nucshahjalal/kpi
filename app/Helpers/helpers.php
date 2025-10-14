<?php

if (!function_exists('get_visited_status  ')) {

    function get_visited_status() {
        return array(  
            'Shah Jalal' => 'Shah Jalal ',
            'Sifat' => 'Sifat',
        );
    }
}

if (!function_exists('get_project_status  ')) {

    function get_project_status() {
        return array(  
            '0' => 'Planning ',
            '1' => 'ongoing',
            '2' => 'Vessel Complete',
            '3' => 'Repowering',
            '4' => 'New Build',
            '5' => 'Halt',
        );
    }
}






