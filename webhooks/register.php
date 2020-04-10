<?php
chdir (dirname (__FILE__));
include __DIR__."/config/config.php";

if (!empty ($new_player)){
	$new_player = base64_decode ($new_player);
	if (!empty ($userName) AND !empty ($accountID)){
		$post = file_get_contents (__DIR__."/asset/json/register.json");
		$post = str_replace ("[BOTNAME]", $botname, $post);
		$post = str_replace ("[COLOR]", hexdec ($color), $post);
		$post = str_replace ("[USERNAME]", $userName, $post);
		$post = str_replace ("[ID]", $accountID, $post);
		$post = str_replace ("[SERVER]", $_SERVER["HTTP_HOST"], $post);
		
		$ch = curl_init($new_player);
		curl_setopt( $ch, CURLOPT_HTTPHEADER, ["content-type: application/json"]);
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $post);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
		curl_exec ($ch);
		curl_close ($ch);
	}
}