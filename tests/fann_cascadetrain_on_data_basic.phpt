--TEST--
Test function fann_cascadetrain_on_data() by calling it with its expected arguments
--FILE--
<?php

$num_input = 2;
$num_output = 1;
$num_layers = 3;
$num_neurons_hidden = 3;
$desired_error = 0.001;
$max_neurons = 30;
$neurons_between_reports = 1;

$ann = fann_create_standard($num_layers, $num_input, $num_neurons_hidden, $num_output);

$filename = ( dirname( __FILE__ ) . "/fann_cascadetrain_on_data.tmp" );				 
$content = <<<EOF
4 2 1
-1 -1
-1
-1 1
1
1 -1
1
1 1
-1
EOF;

file_put_contents( $filename, $content );
$train_data = fann_read_train_from_file( $filename );
var_dump( fann_cascadetrain_on_data( $ann, $train_data, $max_neurons, $neurons_between_reports, $desired_error ) );

?>
--CLEAN--
<?php
$filename = ( dirname( __FILE__ ) . "/fann_cascadetrain_on_data.tmp" );
if ( file_exists( $filename ) )
	unlink( $filename );
?>
--EXPECTF--
bool(true)