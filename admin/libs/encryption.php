<?php
class enc{
	function encrypt($data)
	{
		$secure_data=base64_encode($data);
		return $secure_data;
	}
	function decrypt($data)
	{
		$unsecure_data=base64_decode($data);
		return $unsecure_data;
	}
}
?>