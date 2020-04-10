<?php
class stars {
	public function basicStars ($starss){
		switch ($starss){
			case 1:
			return "Auto 1";
			break;
			case 2:
			return "Easy 2";
			break;
			case 3:
			return "Normal 3";
			break;
			case 4:
			return "Hard 4";
			break;
			case 5:
			return "Hard 5";
			break;
			case 6:
			return "Harder 6";
			break;
			case 7:
			return "Harder 7";
			break;
			case 8: 
			return "Insane 8";
			break;
			case 9:
			return "Insane 9";
			break;
			case 10:
			return "Demon 10";
			break;
			default:
			return "N/A 0";
			break;
			}
		}
	public function demonStars ($starss){
		switch ($starss){
			case 1:
			return "Easy Demon";
			break;
			case 2:
			return "Medium Demon";
			break;
			case 3:
			return "Hard Demon";
			break;
			case 4:
			return "Insane Demon";
			break;
			case 5:
			return "Extreme Demon";
			break;
			default:
			return "Demon";
			break;
			}
		}
	public function chkFeature ($featuree){
		switch ($featuree){
			case 1:
			return "Featured";
			break;
			default:
			return "Not Featured";
			break;
			}
		}
	public function chkCoins ($coinss){
		switch ($coinss){
			case 1:
			return "Coins Verified";
			break;
			default:
			return "Coins not Verified";
			break;
			}
		}
	}