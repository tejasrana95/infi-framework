<?php
function retrive_date($page,$info,$enc)
{
	$index = new show_data();
	$show=$index->get_info('main page','info',0); 
	echo $show[0];
	echo $show[1];
}
	?>