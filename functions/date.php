<?php
function DateTime()
{
$timezone = new DateTimeZone("Asia/Kolkata");
$date_india = new DateTime();
$date_india->setTimezone($timezone );
//$date_with_time = $date_india->format( 'j-m-Y H:i:s' );
$date_with_time = $date_india->format( 'Y-m-j H:i:s' );
$date_only = $date_india->format( 'j/m/Y' );
$time_only = $date_india->format( 'h:i:s A' );
$time_with_date = $date_india->format( 'h:i:s A j/m/Y' );
$date_at_time=$date_only." At ".$time_only;

$mysql_date= $date_india->format( 'Y-m-d' );
$mysql_time= $date_india->format( 'G:i:s' );

return array("date_with_time" => $date_with_time,
"date_only" => $date_only,
"time_only" => $time_only,
"time_with_date" => $time_with_date,
"date_with_time" => $date_with_time,
"date_at_time" => $date_at_time,
"mysql_date" => $mysql_date,
"mysql_time" => $mysql_time
			);
}

?>