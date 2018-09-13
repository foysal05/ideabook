<?php
$start  = date_create('28-02-2018');
$end 	= date_create(); // Current time and date
$diff  	= date_diff( $start, $end );


echo 'The difference in days : ' . $diff->days;
// Output: The difference in days : 10398

?>