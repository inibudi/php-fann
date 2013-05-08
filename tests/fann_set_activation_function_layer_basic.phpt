--TEST--
Test function fann_set_activation_function_layer() by calling it with its expected arguments
--FILE--
<?php

$ann = fann_create_standard( 3, 3, 2, 1 );

var_dump( fann_set_activation_function_layer( $ann, FANN_SIGMOID_SYMMETRIC, 1 ) );
var_dump( fann_get_activation_function( $ann, 1, 1 ) == FANN_SIGMOID_SYMMETRIC );

?>
--EXPECT--
bool(true)
bool(true)