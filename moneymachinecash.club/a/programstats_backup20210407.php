<?php
include_once("mmc_config.php");
include_once("mmc_funs.php");
global $link, $notif_url;
$link=dbconnect();
//Initialize all vars
$timezone_server = date_default_timezone_get();
	
//Today date
$todaydate=date("Y-m-d",time());
//echo "<p>".$todaydate;
$yesterdaydate=date("Y-m-d",time()-86400);
//echo "<p>".$yesterdaydate;
//Find current week number in php
$currentWeekNumber = date('W');
//Find current year
$currentYearNumber = date('Y');

$week_array = getStartAndEndDate($currentWeekNumber,$currentYearNumber);
//print_r($week_array);
//echo date('m-01-Y 00:00:00',strtotime('this month')) . '<br/>';
//echo date('m-t-Y 12:59:59',strtotime('this month')) . '<br/>';
//echo date('Y-m-01 00:00:00',strtotime('this month')) . '<br/>';
//echo date('Y-m-t 12:59:59',strtotime('this month')) . '<br/>';

//Today vars
$totalsignalstoday=0;
$winstoday=0;
$winperctoday=0;
$tpnothittoday=0;
$tpnohitpectoday=0;
$forexpointstotaltoday=0;
$binarypointstotaltoday=0;

//Yesterday vars
$totalsignalsyest=0;
$winsyest=0;
$winpercyest=0;
$tpnothityest=0;
$tpnohitpecyest=0;
$forexpointstotalyest=0;
$binarypointstotalyest=0;

//Week vars
$totalsignalswk=0;
$winswk=0;
$winpercwk=0;
$tpnothitwk=0;
$tpnohitpecwk=0;
$forexpointstotalwk=0;
$binarypointstotalwk=0;

//Month vars
$totalsignalsmo=0;
$winsmo=0;
$winpercmo=0;
$tpnothitmo=0;
$tpnohitpecmo=0;
$forexpointstotalmo=0;
$binarypointstotalmo=0;

//Alltime vars
$totalsignalsall=0;
$winsall=0;
$winpercall=0;
$tpnothitall=0;
$tpnohitpecall=0;
$forexpointstotalall=0;
$binarypointstotalall=0;

//Start loop
$lcnt=0;
$q="SELECT * FROM signals ORDER BY entrytime";
if($r=mysqli_query($link,$q))
{
	while($rdata=mysqli_fetch_array($r))
	{
		$et=$rdata['entrytime'];
		$sy=$rdata['symbol'];
		$tpv=$rdata['tpvalue'];
		$tpg=$rdata['tpgain'];
		
		//Today
		if(strtotime($et)>=strtotime($todaydate))
		{
			$totalsignalstoday++;
			if($tpg>=$tpv) $winstoday++;
			if($tpg<$tpv) $tpnothittoday++;
			if($winstoday+$tpnothittoday > 0)
			{
				$winperctoday=$winstoday/($winstoday+$tpnothittoday);
				$winperctoday=$winperctoday*100;
				$winperctoday=number_format($winperctoday,2);
				
				$tpnohitpectoday=$tpnothittoday/($winstoday+$tpnothittoday);
				$tpnohitpectoday=$tpnohitpectoday*100;
				$tpnohitpectoday=number_format($tpnohitpectoday,2);
			}
			if(strlen($sy)==6) $forexpointstotaltoday=$forexpointstotaltoday+$tpv;
			if(strlen($sy)>6) $binarypointstotaltoday=$binarypointstotaltoday+$tpv;
		}
		
		//Yesterday
		if(strtotime($et)<strtotime($todaydate) && strtotime($et)>=strtotime($yesterdaydate) )
		{
			$totalsignalsyest++;
			if($tpg>=$tpv) $winsyest++;
			if($tpg<$tpv) $tpnothityest++;
			if($winsyest+$tpnothityest > 0)
			{
				$winpercyest=$winsyest/($winsyest+$tpnothityest);
				$winpercyest=$winpercyest*100;
				$winpercyest=number_format($winpercyest,2);
				
				$tpnohitpecyest=$tpnothityest/($winsyest+$tpnothityest);
				$tpnohitpecyest=$tpnohitpecyest*100;
				$tpnohitpecyest=number_format($tpnohitpecyest,2);
			}
			if(strlen($sy)==6) $forexpointstotalyest=$forexpointstotalyest+$tpv;
			if(strlen($sy)>6) $binarypointstotalyest=$binarypointstotalyest+$tpv;
		}
		
		//This week
		if(strtotime($et)>=strtotime($week_array['week_start']))
		{
			$totalsignalswk++;
			if($tpg>=$tpv) $winswk++;
			if($tpg<$tpv) $tpnothitwk++;
			if($winswk+$tpnothitwk > 0)
			{
				$winpercwk=$winswk/($winswk+$tpnothitwk);
				$winpercwk=$winpercwk*100;
				$winpercwk=number_format($winpercwk,2);
				
				$tpnohitpecwk=$tpnothitwk/($winswk+$tpnothitwk);
				$tpnohitpecwk=$tpnohitpecwk*100;
				$tpnohitpecwk=number_format($tpnohitpecwk,2);
			}
			if(strlen($sy)==6) $forexpointstotalwk=$forexpointstotalwk+$tpv;
			if(strlen($sy)>6) $binarypointstotalwk=$binarypointstotalwk+$tpv;
		}
		
		//This month
		if(strtotime($et)>=strtotime(date('Y-m-01 00:00:00',strtotime('this month'))))
		{
			$totalsignalsmo++;
			if($tpg>=$tpv) $winsmo++;
			if($tpg<$tpv) $tpnothitmo++;
			if($winsmo+$tpnothitmo > 0)
			{
				$winpercmo=$winsmo/($winsmo+$tpnothitmo);
				$winpercmo=$winpercmo*100;
				$winpercmo=number_format($winpercmo,2);
				
				$tpnohitpecmo=$tpnothitmo/($winsmo+$tpnothitmo);
				$tpnohitpecmo=$tpnohitpecmo*100;
				$tpnohitpecmo=number_format($tpnohitpecmo,2);
			}
			if(strlen($sy)==6) $forexpointstotalmo=$forexpointstotalmo+$tpv;
			if(strlen($sy)>6) $binarypointstotalmo=$binarypointstotalmo+$tpv;
		}
		
		$totalsignalsall++;
		if($tpg>=$tpv) $winsall++;
		if($tpg<$tpv) $tpnothitall++;
		if($winsall+$tpnothitall > 0)
		{
			$winpercall=$winsall/($winsall+$tpnothitall);
			$winpercall=$winpercall*100;
			$winpercall=number_format($winpercall,2);
			
			$tpnohitpecall=$tpnothitall/($winsall+$tpnothitall);
			$tpnohitpecall=$tpnohitpecall*100;
			$tpnohitpecall=number_format($tpnohitpecall,2);
		}
		if(strlen($sy)==6) $forexpointstotalall=$forexpointstotalall+$tpv;
		if(strlen($sy)>6) $binarypointstotalall=$binarypointstotalall+$tpv;
	}
}
else
{
	echo "<p>ERROR! ".mysqli_error($link);
}

echo <<<HTM
<p>Server timezone - $timezone_server</p>
<br>
***TODAY***
<br>
TOTAL SIGNALA: $totalsignalstoday
<br>
% WINNING SIGNALS TP HIT: $winperctoday %
<br>
% TP NOT HIT: $tpnohitpectoday %
<br>
FOREX POINTS EARNED: $forexpointstotaltoday points
<br>
BINARY POINTS EARNED: $binarypointstotaltoday points
<br>
<br>

***YESTERDAY***
<br>
TOTAL SIGNALA: $totalsignalsyest
<br>
% WINNING SIGNALS TP HIT: $winpercyest %
<br>
% TP NOT HIT: $tpnohitpecyest %
<br>
FOREX POINTS EARNED: $forexpointstotalyest points
<br>
BINARY POINTS EARNED: $binarypointstotalyest points
<br>

<br>
***THIS WEEK***
<br>
TOTAL SIGNALA: $totalsignalswk
<br>
% WINNING SIGNALS TP HIT: $winpercwk %
<br>
% TP NOT HIT: $tpnohitpecwk %
<br>
FOREX POINTS EARNED: $forexpointstotalwk points
<br>
BINARY POINTS EARNED: $binarypointstotalwk points
<br>

<br>


***THIS MONTH***
<br>
TOTAL SIGNALA: $totalsignalsmo
<br>
% WINNING SIGNALS TP HIT: $winpercmo %
<br>
% TP NOT HIT: $tpnohitpecmo %
<br>
FOREX POINTS EARNED: $forexpointstotalmo points
<br>
BINARY POINTS EARNED: $binarypointstotalmo points
<br>
<br>

<br>


***ALL TIME***
<br>
TOTAL SIGNALA: $totalsignalsall
<br>
% WINNING SIGNALS TP HIT: $winpercall %
<br>
% TP NOT HIT: $tpnohitpecall %
<br>
FOREX POINTS EARNED: $forexpointstotalall points
<br>
BINARY POINTS EARNED: $binarypointstotalall points
<br>
TEST TEST
HTM;

dbclose($link);

//echo "File end";
?>



