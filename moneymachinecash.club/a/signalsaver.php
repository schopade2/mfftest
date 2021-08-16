<?php
include_once("mmc_config.php");
include_once("mmc_funs.php");
global $link, $notif_url;
$link=dbconnect();
//Initialize all vars
$a=0;
if(isset($_GET['a'])) $a=$_GET['a'];
switch($a)
{
	case "";
		echo "NO ACTION";
		break;
	case "saveSignal";
		saveSignal();
		break;
	case "savePriceUpdates";
		savePriceUpdates();
		break;
}


dbclose($link);

//echo "File end";
?>