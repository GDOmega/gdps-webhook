<?php
chdir (dirname (__FILE__));
ini_set ("error_reporting", "E_ALL & ~E_NOTICE");
include __DIR__."/config/config.php";
$url = base64_decode ($new_song);

if (!empty ($new_song)){
	if (!empty($newSongID) || $newSongID !==0 AND !$_POST["songlink"]){
		if ($size =="0" || $size == "-0"){
				$size = "Unknown";
			} else {
				$size = $size." MB";
			}
				
		if ($author == "Reupload"){
			$author = "Unknown";
			}
			
		$post = file_get_contents (__DIR__."/asset/json/song.json");
		$post = str_replace ("[BOTNAME]", $botname, $post);
		$post = str_replace ("[TITLE]", $name, $post);
		$post = str_replace ("[CREATOR]", $author, $post);
		$post = str_replace ("[SIZE]", $size, $post);
		$post = str_replace ("[SERVER]", $_SERVER["HTTP_HOST"], $post);
		$post = str_replace ("[DOWNLOAD]", $song, $post);
		$post = str_replace ("[COLOR]", hexdec ($color), $post);
		$post = str_replace ("[ID]", $newSongID, $post);
		
		$ch = curl_init($url);
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $post);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_HTTPHEADER, ["content-type: application/json"]);
		curl_exec ($ch);
		}
	}
