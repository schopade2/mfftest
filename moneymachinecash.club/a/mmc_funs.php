<?php
//Functions included in this file

//function to establish a connection to MySQL and selecting a database to work
function dbconnect()
{
	global $siteadds,$dbhost,$dbname,$dbuser,$dbpwd;
	if($link = mysqli_connect($dbhost,$dbuser,$dbpwd,$dbname))
	{
		// Check connection
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			return;
		}
		return $link;
	}
	else
		print "There is some internal error in retrieving the records. Sorry for the inconvinence.";
}
//function  to close the opened link
function dbclose($link)
{
	global $link;
	if(mysqli_close($link))
	{}
}

function saveSignal()
{
	global $link, $notif_url;
	if($notif_url=="") $notif_url="https://moneymachinecash.club/api/sendNotification.php";
	$tf="";
	if(isset($_GET['tf'])) $tf=$_GET['tf'];
	$sym="";
	if(isset($_GET['sym'])) $sym=$_GET['sym'];
	$ty="";
	if(isset($_GET['ty'])) $ty=$_GET['ty'];
	$tpv=0;
	if(isset($_GET['tpv'])) $tpv=$_GET['tpv'];
	$ep=0;
	if(isset($_GET['ep'])) $ep=$_GET['ep'];
	$aty=0;
	if(isset($_GET['aty'])) $aty=$_GET['aty'];
	$tppv=0;
	if(isset($_GET['tppv'])) $tppv=$_GET['tppv'];
	$lastsignalid=0;
	
	$q="INSERT INTO signals SET timeframe='$tf', symbol='$sym', type='$ty', tpvalue=$tpv, entryprice=$ep, alertType=$aty, tpprice=$tppv, lastupdprice=$ep";
	if(mysqli_query($link,$q))
	{
		$lastsignalid=mysqli_insert_id($link);
		echo "Signal ID inserted: ".$lastsignalid;
		//Call the Send notification API
		echo " - Calling notification URL: ".$notif_url."?signal_id=".$lastsignalid;
		
		$ak="3rRKSNaPB3sLAJdD2XzWNaRAQv2528G3dnfUwPT2EJDDwH8rurjr5FFnGwS5dccr";

		$url = $notif_url."?signal_id=".$lastsignalid;
		//echo $url;
		// User data to send using HTTP POST method in curl
		//$data = array('key'=>'3rRKSNaPB3sLAJdD2XzWNaRAQv2528G3dnfUwPT2EJDDwH8rurjr5FFnGwS5dccr');

		// Data should be passed as json format
		//$data_json = json_encode($data);

		// API URL to send data
		//$url = 'http://dummy.restapiexample.com/api/v1/create';

		// curl initiate
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_HTTPHEADER, array('key: 3rRKSNaPB3sLAJdD2XzWNaRAQv2528G3dnfUwPT2EJDDwH8rurjr5FFnGwS5dccr'));

		// SET Method as a POST
		//curl_setopt($ch, CURLOPT_GET, 1);

		// Pass user data in POST command
		//curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		// Execute curl and assign returned data
		$response  = curl_exec($ch);

		// Close curl
		curl_close($ch);

		// See response if data is posted successfully or any error
		print_r ($response);


		
	}
	
	//echo $tf."|".$sym."|".$ty."|".$tpv."|".$ep."|".$aty."|".$tppv;
	
	
	
	
}


function savePriceUpdates()
{
	global $link;
	$sym="";
	if(isset($_GET['sym'])) $sym=$_GET['sym'];
	$pv=0;
	if(isset($_GET['pv'])) $pv=$_GET['pv'];
	$cpask=0;
	if(isset($_GET['cpask'])) $cpask=$_GET['cpask'];
	$cpbid=0;
	if(isset($_GET['cpbid'])) $cpbid=$_GET['cpbid'];
	//echo $sym." | ".$pv." | ".$cpask." | ".$cpbid;
	//First check if all values have come in positive
	if($pv <= 0 || $cpask <=0 || $cpbid <= 0)
	{
		echo "ERROR! Values incorrect. ";
		return;
	}
	
	//Select all signal records where TPvalue is not met yet
	$q="SELECT * FROM signals WHERE tpgain < tpvalue AND symbol = '$sym'";
	if($r=mysqli_query($link,$q))
	{
		while($rdata=mysqli_fetch_array($r))
		{
			//echo "Entry1";
			$tpgaintouse=0;
			$lastupprice=0;
			$sid=$rdata['sid'];
			$ty=$rdata['type'];
			$ep=$rdata['entryprice'];
			$tg=$rdata['tpgain'];
			$tv=$rdata['tpvalue'];
			$tpprice=$rdata['tpprice'];
			//echo $sid." | ".$ty." | ".$ep." | ".$tg." | ".$tv." | ".$tpprice;
			
			if($ty=="BUY NOW")
			{
				$lastupdprice=$cpbid;
				if($cpbid > $tpprice)
				{
					//echo "Entry2";
					$tpgaintouse=$tv+0.01;
				}
			}
			
			if($ty=="SELL NOW")
			{
				$lastupdprice=$cpask;
				if($cpask < $tpprice)
				{
					//echo "Entry4";
					$tpgaintouse=$tv+0.01;
				}
			}

//			if($ty="BUY NOW" && $cpbid > $ep)
//			{
//				echo "Entry1";
//				$tpgaintouse=$cpbid-$ep;
//				$tpgaintouse=$tpgaintouse/$pv;
//				$lastupdprice=$cpbid;
//			}
//			if($ty="SELL NOW" && $cpask < $ep)
//			{
//				echo "Entry2";
//				$tpgaintouse=$ep-$cpask;
//				$tpgaintouse=$tpgaintouse/$pv;
//				$lastupdprice=$cpask;
//			}
			
//			//Check and adjust tpgain
//			if($tv<$tpgaintouse && $tpgaintouse>0)
//			{
//				echo "Entry3";
//				$tpgaintouse=$tv+0.01;
//			}
//			else
//			{
//				echo "Entry4";
//				$tpgaintouse=0;
//			}
			if($lastupdprice>0)
			{
				//echo "Entry6";
				//Find last update time
				$lastupdtime=date("Y-m-d H:i:s", time());
				//Update the records
				$qu="UPDATE signals SET tpgain = $tpgaintouse, lastupdprice=$lastupdprice, lastupdtime='$lastupdtime' WHERE sid=$sid";
				if(mysqli_query($link,$qu))
				{
					//OK here
					echo "$sid updated.";
				}
				else
				{
					echo "ERROR! ".mysqli_error($link);
				}
			}
		}
		
	}
	else
	{
		echo "ERROR! ".mysqli_error($link);
	}
	
	
	//echo $tf."|".$sym."|".$ty."|".$tpv."|".$ep."|".$aty."|".$tppv;
	
	
	
	
}

//Find start and end of week
function getStartAndEndDate($week, $year) {
  $dto = new DateTime();
  $dto->setISODate($year, $week);
  $ret['week_start'] = $dto->format('Y-m-d');
  $dto->modify('+6 days');
  $ret['week_end'] = $dto->format('Y-m-d');
  return $ret;
}
?>