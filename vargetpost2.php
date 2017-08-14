<?php

function getpresent($varname)
{
    $a=filter_input(INPUT_GET, $varname);
    if (isset($a)) return TRUE;
    else return FALSE;
}


function postpresent($varname)
{
    $a=filter_input(INPUT_POST, $varname);
    if (isset($a)) return TRUE;
    else return FALSE;
}

function post2var($varname, $defvalue)
{
    if (postpresent($varname) === TRUE) 
        return filter_input (INPUT_POST, $varname); 
    else 
        return $defvalue;
}

function get2var($varname,$defvalue)
{
    if (getpresent($varname) === TRUE)
        return filter_input (INPUT_GET, $varname);
    else
        return $defvalue;            
}

function post2arr($prefix)
{   
    $result=array();
    $len=  strlen($prefix);
    $buffer=filter_input_array(INPUT_POST);
    if (isset($buffer))
    {
       foreach($buffer as $name => $value)
       {
        if ($prefix!='') 
          {  
            if ((substr($name,0,$len)==$prefix)  && ($value!='')) 
                    $result[substr($name,$len,strlen($name)-$len)]=$value;
          }
       else {
              if ($value!='') 
                  $result[$name]=$value;
            }   
           
       }
    }
    return $result;
}

function get2arr($prefix)
{   
    $result=array();
    $len=  strlen($prefix);
    $buffer=filter_input_array(INPUT_GET);
    if (isset($buffer))
    {
        foreach($buffer as $name => $value)
       {
        if ($prefix!='') 
          {  
            if ((substr($name,0,$len)==$prefix)  && ($value!='')) 
                    $result[substr($name,$len,strlen($name)-$len)]=$value;
          }
       else {
              if ($value!='') 
                  $result[$name]=$value;
            }   
         
       }
    }
    return $result;
}

?>