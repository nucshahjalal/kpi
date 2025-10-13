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
            'Planning' => 'Planning ',
            'ongoing' => 'ongoing',
            'Vessel Complete' => 'Vessel Complete',
            'Repowering' => 'Repowering',
            'New Build' => 'New Build',
            'Halt' => 'Halt',
        );
    }
}






