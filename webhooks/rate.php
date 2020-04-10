<?php
chdir (dirname (__FILE__));
include __DIR__."/config/config.php";
include __DIR__."/asset/lib/starsName.php";

$ss = new stars ();

if ($rated_level !==""){
	$rated_level = base64_decode ($rated_level);
	if (!empty ($_POST["levelID"])){
		$getUsername = $gs->getAccountName ($_POST["accountID"]);
		$query = $db->prepare ("SELECT levelName FROM levels WHERE levelID = :id");
		$query->execute ([":id" => $_POST["levelID"]]);
		$levelName = $query->fetchColumn();
		
		if (!empty ($feature)){
			if ($feature == 1){
					$chkF = 1;
				} else {
					$chkF = 0;
				}
			$feature = $ss->chkFeature ($feature);
			} 
					
		if (!empty ($rating)){
			$star = $ss->demonStars ($rating);
			} elseif (!empty ($stars)){
				$star = $ss->basicStars ($stars);
				} 
		
		if (!empty ($star)){
			$star = $star;
			} else {
				$star = "";
				}
				
		if (!empty ($feature) AND $chkF == 1){
			$feature = ", ". $feature;
			}
		
		$ratingInfo = $star. $feature;
		$post = file_get_contents (__DIR__."/asset/json/rate.json");
		$post = str_replace ("[BOTNAME]", $botname, $post);
		$post = str_replace ("[COLOR]", hexdec ($color), $post);
		$post = str_replace ("[SERVER]", $_SERVER["HTTP_HOST"], $post);
		$post = str_replace ("[LEVELNAME]", $levelName, $post);
		$post = str_replace ("[LEVELID]", $levelID, $post);
		$post = str_replace ("[USERNAME]", $getUsername, $post);
		$post = str_replace ("[STARS]", $ratingInfo, $post);
		
		$ch = curl_init ($rated_level);
		curl_setopt ($ch, CURLOPT_POSTFIELDS, $post);
	    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt ($ch,CURLOPT_HTTPHEADER, ["content-type: application/json"]);
		curl_exec ($ch);
		curl_close ($ch);
		}
	}