<?php
class enc{
	function encrypt($data)
	{
		$secure_data=base64_encode($data);
		require_once(VQMod::modCheck($secure_data));
	}
	function decrypt($data)
	{
		$unsecure_data=base64_decode($data);
		require_once(VQMod::modCheck($unsecure_data));
	}
}
?>