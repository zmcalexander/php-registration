<?php

class Student {

public $sid = 0;

public $fName = "";

public $lName = "";

public $major = "";

public $class1 = "";

public $class2 = "";

public $class3 = "";

// -+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=* Constructor -+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*

function __construct($value1, $value2, $value3, $value4, $value5, $value6, $value7) {

$sid_error = $this->set_sid($value1) == TRUE ? 'TRUE' : 'FALSE';
$fName_error = $this->set_fName($value2) == TRUE ? 'TRUE' : 'FALSE';
$lName_error = $this->set_lName($value3) == TRUE ? 'TRUE' : 'FALSE';
$major_error= $this->set_major($value4) == TRUE ? 'TRUE' : 'FALSE';
$class1_error= $this->set_class1($value5) == TRUE ? 'TRUE' : 'FALSE';
$class2_error= $this->set_class2($value6) == TRUE ? 'TRUE' : 'FALSE';
$class3_error= $this->set_class3($value7) == TRUE ? 'TRUE' : 'FALSE';

$this->error_message = $sid_error . $fName_error . $lName_error . $major_error . $class1_error . 
$class2_error . $class3_error ;

}//end constructor

// -+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=* Setters -+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*

function set_sid($value){

	$error_message = TRUE;

	(ctype_alpha($value) && strlen($value) <= 16) ? $this->sid = $value : $error_message = FALSE;

	return $error_message;

}

function set_fName($value){

	$error_message = TRUE;

	(ctype_alpha($value) && strlen($value) <= 20) ? $this->fName = $value : $error_message = FALSE;

	return $error_message;

}
function set_lName($value){

	$error_message = TRUE;

	(ctype_alpha($value) && strlen($value) <= 20) ? $this->lName = $value : $error_message = FALSE;

	return $error_message;

}

function set_major($value){

    $error_message = TRUE;

    (ctype_alpha($value) && strlen($value) <= 60) ? $this->major = $value : $error_message = FALSE;

    return $error_message;

}

function set_class1($value){

    $error_message = TRUE;

    (ctype_alnum($value) && strlen($value) <= 60) ? $this->class1 = $value : $error_message = FALSE;

    return $error_message;

}

function set_class2($value){

    $error_message = TRUE;

    (ctype_alnum($value) && strlen($value) <= 60) ? $this->class2 = $value : $error_message = FALSE;

    return $error_message;

}

function set_class3($value){

    $error_message = TRUE;

    (ctype_alnum($value) && strlen($value) <= 60) ? $this->class3 = $value : $error_message = FALSE;

    return $error_message;

}

// -+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=* Getters -+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*-+=*

function get_sid(){

return $this->sid;

}

function get_fName(){

return $this->fName;

}

function get_lName(){

return $this->lName;

}

function get_major(){

return $this->major;

}

function get_class1(){

return $this->class1;

}

function get_class2(){

return $this->class2;

}

function get_class3(){

return $this->class3;

}

/*
function get_properties()
{
return "$this->fName,$this->fName,$this->dog_color.";
}
*/

}//end class

?>