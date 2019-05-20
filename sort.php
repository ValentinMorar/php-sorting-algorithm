<?php

$group=array('cvalue0','bvalue2','bvalue0','cvalue1','avalue0');

$sorting_table=array(  
    'a'=>1,'A'=>1,
    'b'=>2,'B'=>2,
    'c'=>3,'C'=>3, 
    'd'=>4,'D'=>4, 
    'e'=>5,'E'=>5,
    'f'=>6,'F'=>6,
    'g'=>7,'G'=>7,
    'i'=>8,'I'=>8,
    'j'=>9,'J'=>9,
    'k'=>10,'K'=>10,
    'l'=>11,'L'=>11,
     'm'=>12,'M'=>12,
    'n'=>13,'N'=>13,
    'o'=>14,'O'=>14, 
    'p'=>15,'P'=>15, 
    'q'=>16,'q'=>16,
    'r'=>17,'R'=>17,
    's'=>18,'S'=>18,
    't'=>19,'T'=>19,
    'u'=>20,'U'=>20,
    'v'=>21,'V'=>21,
    'w'=>22,'W'=>22,
    'x'=>23,'X'=>23,
    'y'=>24,'Y'=>24,
    'z'=>25,'Z'=>25,
    '0'=>26,
    '1'=>27,
    '2'=>28,
    '3'=>29,
    '4'=>30,
    '5'=>31,
    '6'=>32,
    '7'=>33,
    '8'=>34,
    '9'=>35
    );
// This is a custom defined sorting table, where the keys are characters and the values are represent by numbers indexed (arranged) in the way we wanna have the final result .


$indexed_empty_array= array_fill(0, 35, array()); 

$sorted_array=array(); 
// this array will store final result

function get_current_chars_indexed($array,$cp){  
// custom defined function
    
	global $indexed_empty_array,$sorted_array,$group,$sorting_table;
    
    $sort= $indexed_empty_array; 
    $found_char=0;

    foreach ($array as $value) {
    $char= substr($group[$value],$cp,1); 
// extract character from the value from the $cp position 
   
        if($char!==FALSE && !empty($char)){
            $sort[$sorting_table[$char]][]=$value; 
            $found_char=1;
        }else{ 
            $sorted_array[$value]=$group[$value];
// if values to be sorted has no more character (the end of the string) we put the value in $sorted_array
        }       
    }
    
    if($found_char==1){ 
        return $sort;}
    else{
       return FALSE;
    }
}

function array_sorting($array,$cp){
// custom defined function
    
    global $sorted_array,$group;
    
    if(($sort= get_current_chars_indexed($array, $cp))!=FALSE){
        
        foreach($sort as $key=>$line_value){            
                if(!empty($line_value)){
                    if(!isset($line_value[1]) && !isset($sorted_array[$line_value[0]]))
                    { 
// if the array $line_value has only one value and sorted_array with this value is not defined create the value in sorted_array
                        $sorted_array[$line_value[0]]=$group[$line_value[0]]; 
                    }else{ 
//  if the array has more then one value call the function again and compare next characters, from the values
                         $next=$cp+1; 
// move to next character and compare
                         array_sorting($line_value,$next);
                    }         
                }            
        }
    }
}
 
array_sorting(array_keys($group), 0);
// second value represent from what point you compare the strings first, second, third ...  character


print_r($sorted_array);

