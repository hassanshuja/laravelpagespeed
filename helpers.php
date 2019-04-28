<?php


function unit_helper($unit,$total=1){
    switch($unit){
        case('Person'):
            if($i>1){
                return 'Personen';
            }
        break;
        case('Pauschale'):
            if($i>1){
                return 'Pauschalen';
            }
        break;
            
    }
    return $unit;
    
}