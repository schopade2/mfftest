<html lang="en">
<head>
    
	<meta charset="UTF-8">
	<meta http-equiv="refresh" content="20">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LIVE PERFORMANCE MMC</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;1,500&display=swap" rel="stylesheet">
	<style>
	body {
      background: linear-gradient(to left, #000000 0%, #0f1a52 100%);
      color: white;
	  font-family: 'Roboto', sans-serif;
	  font-style: italic;
         } 
		 svg {
        display: inline-block;
        font-size: 17px;
        font-weight: normal;
        margin-right: 0;
        text-align: center;
        position: relative;
        width: 150px;
        height: 150px;
        z-index: 1000;
      }

      .circle {
        display: inline-block;
        font-size: 17px;
        font-weight: normal;
        margin-right: 0;
        text-align: center;
        width: 100%;
        height: 100%;
        fill: none;
        stroke: #dc1c13 ;
        stroke-width: 10;
        stroke-linecap: round;
        transform: translate(5px, 5px);
      }
      .circle1 {
        display: inline-block;
        font-size: 17px;
        font-weight: normal;
        margin-right: 0;
        text-align: center;
        width: 100%;
        height: 100%;
        fill: none;
        stroke: #FF7F00;
        stroke-width: 10;
        stroke-linecap: round;
        transform: translate(5px, 5px);
      }
	  .circle3 {
        display: inline-block;
        font-size: 17px;
        font-weight: normal;
        margin-right: 0;
        text-align: center;
        width: 100%;
        height: 100%;
        fill: none;
        stroke: #2eb62c;
        stroke-width: 10;
        stroke-linecap: round;
        transform: translate(5px, 5px);
      }

      .percent {
        display: inline-block;
        font-size: 17px;
        font-weight: normal;
        margin-right: 0;
        text-align: center;
        position: relative;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        box-shadow: inset 0 0 50px #000;
        background: #222;
        z-index: 1000;
      }

      .percent .number {
        display: inline-block;
        font-size: 17px;
        font-weight: normal;
        margin-right: 0;
        text-align: center;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
      }

      .percent .number h2 {
        display: inline-block;
        font-size: 17px;
        font-weight: normal;
        margin-right: 0;
        text-align: center;
        color: white;
        font-weight: 700;
        font-size: 40px;
        transition: 0.5s;
      }
	  .txt {
        display: inline-block;
        font-size: 17px;    
        margin-right: 0;
        text-align: center;
        position: relative;
        width: 150px;
        height: 150px;
      }
	  .center-show{
            visibility: hidden;
      }
	  .binary-cen{
		margin-left: -220px;
		font-weight: bold;
		font-size: 17px;
	  }
	  .binary-data{
		border-style: double;
		width: 340px;
		border-radius: 20px;
	  }
	  .total-body{
		margin-left: 170px; 
	  }

	  @media(max-width: 400px){
        .center-show{
            display: block;
			margin-bottom: 40px;
      }
	 .binary-cen{
		margin-left: 0px;
	  }
	  .total-body{
		margin-left: 0px; 
	  }
	  
      }

    </style>
</head>






<center class='total-body'>
<body>
<br>
<br><br>
<center class='binary-cen'><a href="https://wa.me/212607416874"><img src="https://moneymachinecash.club/a/banner-320.png"></a></center>
<br><br>
<br>
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

//Last Month vars
$totalsignalslmo=0;
$winslmo=0;
$winperclmo=0;
$tpnothitlmo=0;
$tpnohitpeclmo=0;
$forexpointstotallmo=0;
$binarypointstotallmo=0;

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
		//Last month
		if(strtotime($et)>=strtotime(date('Y-m-01 00:00:00',strtotime('last month')))
			&& strtotime($et)<strtotime(date('Y-m-01 00:00:00',strtotime('this month'))))
		{
			$totalsignalslmo++;
			if($tpg>=$tpv) $winslmo++;
			if($tpg<$tpv) $tpnothitlmo++;
			if($winslmo+$tpnothitlmo > 0)
			{
				$winperclmo=$winslmo/($winslmo+$tpnothitlmo);
				$winperclmo=$winperclmo*100;
				$winperclmo=number_format($winperclmo,2);
				
				$tpnohitpeclmo=$tpnothitlmo/($winslmo+$tpnothitlmo);
				$tpnohitpeclmo=$tpnohitpeclmo*100;
				$tpnohitpeclmo=number_format($tpnohitpeclmo,2);
			}
			if(strlen($sy)==6) $forexpointstotallmo=$forexpointstotallmo+$tpv;
			if(strlen($sy)>6) $binarypointstotallmo=$binarypointstotallmo+$tpv;
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

//////////////////////////////////////////////////////////////////////////////////////
//-------------------------------Today Code ------------------------------------------

echo "<p>
<p class='binary-cen'>Server Timezone - $timezone_server</p>
<br>
<p class='binary-cen'>
********* TODAY *********
</p>
<br/>
<br/>
</p>";

// ----------Total Signals Today-----------
if ( $totalsignalstoday < 10) {   
echo "
<div class='percent'>
<svg>
  <circle class='circle' cx='70' cy='70' r='70'></circle>
</svg>
<div class='number'>
  <h3>$totalsignalstoday</h3>
</div>
<p>TOTAL SIGNALS</P>
</div>
<span class='center-show'>Giving Space Using this Property</span>
";
} 
if ( $totalsignalstoday >= 10 AND $totalsignalstoday <= 50 ) {   
	echo "
	<div class='percent'>
	<svg>
	  <circle class='circle1' cx='70' cy='70' r='70'></circle>
	</svg>
	<div class='number'>
	  <h3>$totalsignalstoday</h3>
	</div>
	<p>TOTAL SIGNALS</P>
	</div>
	<span class='center-show'>Giving Space Using this Property</span>
	";
} 
if ( $totalsignalstoday > 50) {   
		echo "
		<div class='percent'>
		<svg>
		  <circle class='circle3' cx='70' cy='70' r='70'></circle>
		</svg>
		<div class='number'>
		  <h3>$totalsignalstoday</h3>
		</div>
		<p>TOTAL SIGNALS</P>
		</div>
		<span class='center-show'>Giving Space Using this Property</span>
		";
} 


// ----------WINNING SIGNALS TP HIT-----------
if ( $winperctoday < 10) {   
	echo "
	<div class='percent'>
	<svg>
	  <circle class='circle' cx='70' cy='70' r='70'></circle>
	</svg>
	<div class='number'>
	  <h3>$winperctoday<span>%</span></h3>
	</div>
	<p>WINNING TP HIT</P>
	</div>
	<span class='center-show'>Giving Space Using this Property</span>
	";
	} 
	if ( $winperctoday >= 10 AND $winperctoday <= 50 ) {   
		echo "
		<div class='percent'>
		<svg>
		  <circle class='circle1' cx='70' cy='70' r='70'></circle>
		</svg>
		<div class='number'>
		  <h3>$winperctoday<span>%</span></h3>
		</div>
		<p>WINNING TP HIT</P>
		</div>
		<span class='center-show'>Giving Space Using this Property</span>
		";
	} 
	if ( $winperctoday > 50) {   
			echo "
			<div class='percent'>
			<svg>
			  <circle class='circle3' cx='70' cy='70' r='70'></circle>
			</svg>
			<div class='number'>
			  <h3>$winperctoday<span>%</span></h3>
			</div>
			<p>WINNING TP HIT</P>
			</div>
			<span class='center-show'>Giving Space Using this Property</span>
			";
	} 

// ----------TP NOT HIT-----------
if ( $tpnohitpectoday < 10) {   
	echo "
	<div class='percent'>
	<svg>
	  <circle class='circle3' cx='70' cy='70' r='70'></circle>
	</svg>
	<div class='number'>
	  <h3>$tpnohitpectoday<span>%</span></h3>
	</div>
	<p>TP NOT HIT</P>
	</div>
	<span class='center-show'>Giving Space Using this Property</span>
	";
	} 
	if ( $tpnohitpectoday >= 10 AND $tpnohitpectoday <= 50 ) {   
		echo "
		<div class='percent'>
		<svg>
		  <circle class='circle1' cx='70' cy='70' r='70'></circle>
		</svg>
		<div class='number'>
		  <h3>$tpnohitpectoday<span>%</span></h3>
		</div>
		<p>TP NOT HIT</P>
		</div>
		<span class='center-show'>Giving Space Using this Property</span>
		";
	} 
	if ( $tpnohitpectoday > 50) {   
			echo "
			<div class='percent'>
			<svg>
			  <circle class='circle' cx='70' cy='70' r='70'></circle>
			</svg>
			<div class='number'>
			  <h3>$tpnohitpectoday<span>%</span></h3>
			</div>
			<p>TP NOT HIT</P>
			</div>
			<span class='center-show'>Giving Space Using this Property</span>
			";
	}

echo "<center class='binary-cen'>
<br>
<br>
<div class='binary-data'>
<br>
<br>
FOREX POINTS EARNED: $forexpointstotaltoday points
<br>
BINARY POINTS EARNED: $binarypointstotaltoday points
<br>
<br>
<br>
</div>
</center>";


//////////////////////////////////////////////////////////////////////////////////////
//-------------------------------Yesterday Code ------------------------------------------

echo "<p>
<br>
<br>
<br>
<p class='binary-cen'>
********* YESTERDAY *********
</p>
<br>
<br>
</p>";


// ----------Total Signals Yesterday-----------
if ( $totalsignalsyest < 10) {   
echo "
<div class='percent'>
<svg>
  <circle class='circle' cx='70' cy='70' r='70'></circle>
</svg>
<div class='number'>
  <h3>$totalsignalsyest</h3>
</div>
<p>TOTAL SIGNALS</P>
</div>
<span class='center-show'>Giving Space Using this Property</span>
";
} 
if ( $totalsignalsyest >= 10 AND $totalsignalsyest <= 50 ) {   
	echo "
	<div class='percent'>
	<svg>
	  <circle class='circle1' cx='70' cy='70' r='70'></circle>
	</svg>
	<div class='number'>
	  <h3>$totalsignalsyest</h3>
	</div>
	<p>TOTAL SIGNALS</P>
	</div>
	<span class='center-show'>Giving Space Using this Property</span>
	";
} 
if ( $totalsignalsyest > 50) {   
		echo "
		<div class='percent'>
		<svg>
		  <circle class='circle3' cx='70' cy='70' r='70'></circle>
		</svg>
		<div class='number'>
		  <h3>$totalsignalsyest</h3>
		</div>
		<p>TOTAL SIGNALS</P>
		</div>
		<span class='center-show'>Giving Space Using this Property</span>
		";
} 

// ----------WINNING SIGNALS TP HIT-----------
if ( $winpercyest < 10) {   
	echo "
	<div class='percent'>
	<svg>
	  <circle class='circle' cx='70' cy='70' r='70'></circle>
	</svg>
	<div class='number'>
	  <h3>$winpercyest<span>%</span></h3>
	</div>
	<p>WINNING TP HIT</P>
	</div>
	<span class='center-show'>Giving Space Using this Property</span>	
	";
	} 
	if ( $winpercyest >= 10 AND $winpercyest <= 50 ) {   
		echo "
		<div class='percent'>
		<svg>
		  <circle class='circle1' cx='70' cy='70' r='70'></circle>
		</svg>
		<div class='number'>
		  <h3>$winpercyest<span>%</span></h3>
		</div>
		<p>WINNING TP HIT</P>
		</div>
		<span class='center-show'>Giving Space Using this Property</span>	
		";
	} 
	if ( $winpercyest > 50) {   
			echo "
			<div class='percent'>
			<svg>
			  <circle class='circle3' cx='70' cy='70' r='70'></circle>
			</svg>
			<div class='number'>
			  <h3>$winpercyest<span>%</span></h3>
			</div>
			<p>WINNING TP HIT</P>
			</div>
			<span class='center-show'>Giving Space Using this Property</span>	
			";
	} 

// ----------TP NOT HIT-----------
if ( $tpnohitpecyest < 10) {   
	echo "
	<div class='percent'>
	<svg>
	  <circle class='circle3' cx='70' cy='70' r='70'></circle>
	</svg>
	<div class='number'>
	  <h3>$tpnohitpecyest<span>%</span></h3>
	</div>
    <p>TP NOT HIT</P>
	</div>
	<span class='center-show'>Giving Space Using this Property</span>	
	";
	} 
	if ( $tpnohitpecyest >= 10 AND $tpnohitpecyest <= 50 ) {   
		echo "
		<div class='percent'>
		<svg>
		  <circle class='circle1' cx='70' cy='70' r='70'></circle>
		</svg>
		<div class='number'>
		  <h3>$tpnohitpecyest<span>%</span></h3>
		</div>
		<p>TP NOT HIT</P>
		</div>
		<span class='center-show'>Giving Space Using this Property</span>
		";
	} 
	if ( $tpnohitpecyest > 50) {   
			echo "
			<div class='percent'>
			<svg>
			  <circle class='circle' cx='70' cy='70' r='70'></circle>
			</svg>
			<div class='number'>
			  <h3>$tpnohitpecyest<span>%</span></h3>
			</div>
			<p>TP NOT HIT</P>
			</div>
			<span class='center-show'>Giving Space Using this Property</span>
			";
	}

echo "<center class='binary-cen'>
<br>
<br>
<div class='binary-data'>
<br>
<br>
FOREX POINTS EARNED: $forexpointstotalyest points
<br>
BINARY POINTS EARNED: $binarypointstotalyest points
<br>
<br>
<br>
</div>
</center>";



//////////////////////////////////////////////////////////////////////////////////////
//-------------------------------THIS WEEK Code ------------------------------------------

echo "<p>
<br>
<br>
<br>
<p class='binary-cen'>
********* THIS WEEK *********
</p>
<br>
<br>
</p>";


// ----------Total Signals This week-----------
if (  $totalsignalswk < 10) {   
echo "
<div class='percent'>
<svg>
  <circle class='circle' cx='70' cy='70' r='70'></circle>
</svg>
<div class='number'>
  <h3> $totalsignalswk</h3>
</div>
<p>TOTAL SIGNALS</P>
</div>
<span class='center-show'>Giving Space Using this Property</span>
";
} 
if (  $totalsignalswk >= 10 AND  $totalsignalswk <= 50 ) {   
	echo "
	<div class='percent'>
	<svg>
	  <circle class='circle1' cx='70' cy='70' r='70'></circle>
	</svg>
	<div class='number'>
	  <h3> $totalsignalswk</h3>
	</div>
	<p>TOTAL SIGNALS</P>
	</div>
	<span class='center-show'>Giving Space Using this Property</span>
	";
} 
if (  $totalsignalswk > 50) {   
		echo "
		<div class='percent'>
		<svg>
		  <circle class='circle3' cx='70' cy='70' r='70'></circle>
		</svg>
		<div class='number'>
		  <h3> $totalsignalswk</h3>
		</div>
        <p>TOTAL SIGNALS</P>
        </div>
        <span class='center-show'>Giving Space Using this Property</span>
		";
} 

// ----------WINNING SIGNALS TP HIT-----------
if ( $winpercwk < 10) {   
	echo "
	<div class='percent'>
	<svg>
	  <circle class='circle' cx='70' cy='70' r='70'></circle>
	</svg>
	<div class='number'>
	  <h3>$winpercwk<span>%</span></h3>
	</div>
	<p>WINNING TP HIT</P>
	</div>
	<span class='center-show'>Giving Space Using this Property</span>
	";
	} 
	if ( $winpercwk >= 10 AND $winpercwk <= 50 ) {   
		echo "
		<div class='percent'>
		<svg>
		  <circle class='circle1' cx='70' cy='70' r='70'></circle>
		</svg>
		<div class='number'>
		  <h3>$winpercwk<span>%</span></h3>
		</div>
        <p>WINNING TP HIT</P>
	    </div>
	    <span class='center-show'>Giving Space Using this Property</span>
		";
	} 
	if ( $winpercwk > 50) {   
			echo "
			<div class='percent'>
			<svg>
			  <circle class='circle3' cx='70' cy='70' r='70'></circle>
			</svg>
			<div class='number'>
			  <h3>$winpercwk<span>%</span></h3>
			</div>
			<p>WINNING TP HIT</P>
	        </div>
	        <span class='center-show'>Giving Space Using this Property</span>
			";
	} 

// ----------TP NOT HIT-----------
if ( $tpnohitpecwk < 10) {   
	echo "
	<div class='percent'>
	<svg>
	  <circle class='circle3' cx='70' cy='70' r='70'></circle>
	</svg>
	<div class='number'>
	  <h3>$tpnohitpecwk<span>%</span></h3>
	</div>
    <p>TP NOT HIT</P>
	</div>
	<span class='center-show'>Giving Space Using this Property</span>
	";
	} 
	if ( $tpnohitpecwk >= 10 AND $tpnohitpecwk <= 50 ) {   
		echo "
		<div class='percent'>
		<svg>
		  <circle class='circle1' cx='70' cy='70' r='70'></circle>
		</svg>
		<div class='number'>
		  <h3>$tpnohitpecwk<span>%</span></h3>
		</div>
		<p>TP NOT HIT</P>
	    </div>
	    <span class='center-show'>Giving Space Using this Property</span>
		";
	} 
	if ( $tpnohitpecwk > 50) {   
			echo "
			<div class='percent'>
			<svg>
			  <circle class='circle' cx='70' cy='70' r='70'></circle>
			</svg>
			<div class='number'>
			  <h3>$tpnohitpecwk<span>%</span></h3>
			</div>
            <p>TP NOT HIT</P>
	        </div>
	        <span class='center-show'>Giving Space Using this Property</span>
			";
	}

echo "<center class='binary-cen'><br>
<br>
<div class='binary-data'>
<br>
<br>
FOREX POINTS EARNED: $forexpointstotalwk points
<br>
BINARY POINTS EARNED: $binarypointstotalwk points
<br>
<br>
<br>
</div>
</center>";





//////////////////////////////////////////////////////////////////////////////////////
//-------------------------------THIS Month Code ------------------------------------------

echo "<p>
<br>
<br>
<br>
<p class='binary-cen'>
********* THIS MONTH *********
</p>
<br>
<br>
</p>";


// ----------Total Signals This Month-----------
if (  $totalsignalsmo < 10) {   
echo "
<div class='percent'>
<svg>
  <circle class='circle' cx='70' cy='70' r='70'></circle>
</svg>
<div class='number'>
  <h3> $totalsignalsmo</h3>
</div>
<p>TOTAL SIGNALS</P>
</div>
<span class='center-show'>Giving Space Using this Property</span>
";
} 
if (  $totalsignalsmo >= 10 AND  $totalsignalsmo <= 50 ) {   
	echo "
	<div class='percent'>
	<svg>
	  <circle class='circle1' cx='70' cy='70' r='70'></circle>
	</svg>
	<div class='number'>
	  <h3> $totalsignalsmo</h3>
	</div>
	<p>TOTAL SIGNALS</P>
	</div>
	<span class='center-show'>Giving Space Using this Property</span>
	";
} 
if (  $totalsignalsmo > 50) {   
		echo "
		<div class='percent'>
		<svg>
		  <circle class='circle3' cx='70' cy='70' r='70'></circle>
		</svg>
		<div class='number'>
		  <h3> $totalsignalsmo</h3>
		</div>
		<p>TOTAL SIGNALS</P>
		</div>
		<span class='center-show'>Giving Space Using this Property</span>
		";
} 

// ----------WINNING SIGNALS TP HIT-----------
if ( $winpercmo < 10) {   
	echo "
	<div class='percent'>
	<svg>
	  <circle class='circle' cx='70' cy='70' r='70'></circle>
	</svg>
	<div class='number'>
	  <h3>$winpercmo<span>%</span></h3>
	</div>
	<p>WINNING TP HIT</P>
	</div>
	<span class='center-show'>Giving Space Using this Property</span>
	";
	} 
	if ( $winpercmo >= 10 AND $winpercmo <= 50 ) {   
		echo "
		<div class='percent'>
		<svg>
		  <circle class='circle1' cx='70' cy='70' r='70'></circle>
		</svg>
		<div class='number'>
		  <h3>$winpercmo<span>%</span></h3>
		</div>
		<p>WINNING TP HIT</P>
		</div>
		<span class='center-show'>Giving Space Using this Property</span>
		";
	} 
	if ( $winpercmo > 50) {   
			echo "
			<div class='percent'>
			<svg>
			  <circle class='circle3' cx='70' cy='70' r='70'></circle>
			</svg>
			<div class='number'>
			  <h3>$winpercmo<span>%</span></h3>
			</div>
			<p>WINNING TP HIT</P>
			</div>
			<span class='center-show'>Giving Space Using this Property</span>
			";
	} 

// ----------TP NOT HIT-----------
if ( $tpnohitpecmo < 10) {   
	echo "
	<div class='percent'>
	<svg>
	  <circle class='circle3' cx='70' cy='70' r='70'></circle>
	</svg>
	<div class='number'>
	  <h3>$tpnohitpecmo<span>%</span></h3>
	</div>
	<p>TP NOT HIT</P>
	</div>
	<span class='center-show'>Giving Space Using this Property</span>	
	";
	} 
	if ( $tpnohitpecmo >= 10 AND $tpnohitpecmo <= 50 ) {   
		echo "
		<div class='percent'>
		<svg>
		  <circle class='circle1' cx='70' cy='70' r='70'></circle>
		</svg>
		<div class='number'>
		  <h3>$tpnohitpecmo<span>%</span></h3>
		</div>
		<p>TP NOT HIT</P>
		</div>
		<span class='center-show'>Giving Space Using this Property</span>
		";
	} 
	if ( $tpnohitpecmo > 50) {   
			echo "
			<div class='percent'>
			<svg>
			  <circle class='circle' cx='70' cy='70' r='70'></circle>
			</svg>
			<div class='number'>
			  <h3>$tpnohitpecmo<span>%</span></h3>
			</div>
			<p>TP NOT HIT</P>
			</div>
			<span class='center-show'>Giving Space Using this Property</span>
			";
	}

echo "<center class='binary-cen'><br>
<br>
<div class='binary-data'>
<br>
<br>
FOREX POINTS EARNED: $forexpointstotalmo points
<br>
BINARY POINTS EARNED: $binarypointstotalmo points
<br>
<br>
<br>
</div>
</center>";




//////////////////////////////////////////////////////////////////////////////////////
//-------------------------------LAST Month Code ------------------------------------------

echo "<p>
<br>
<br>
<br>
<p class='binary-cen'>
********* LAST MONTH *********
</p>
<br>
<br>
</p>";


// ----------Total Signals This Month-----------
if (  $totalsignalslmo < 10) {   
echo "
<div class='percent'>
<svg>
  <circle class='circle' cx='70' cy='70' r='70'></circle>
</svg>
<div class='number'>
  <h3> $totalsignalslmo</h3>
</div>
<p>TOTAL SIGNALS</P>
</div>
<span class='center-show'>Giving Space Using this Property</span>
";
} 
if (  $totalsignalslmo >= 10 AND  $totalsignalslmo <= 50 ) {   
	echo "
	<div class='percent'>
	<svg>
	  <circle class='circle1' cx='70' cy='70' r='70'></circle>
	</svg>
	<div class='number'>
	  <h3> $totalsignalslmo</h3>
	</div>
	<p>TOTAL SIGNALS</P>
	</div>
	<span class='center-show'>Giving Space Using this Property</span>
	";
} 
if (  $totalsignalslmo > 50) {   
		echo "
		<div class='percent'>
		<svg>
		  <circle class='circle3' cx='70' cy='70' r='70'></circle>
		</svg>
		<div class='number'>
		  <h3> $totalsignalslmo</h3>
		</div>
		<p>TOTAL SIGNALS</P>
		</div>
		<span class='center-show'>Giving Space Using this Property</span>
		";
} 

// ----------WINNING SIGNALS TP HIT-----------
if ( $winperclmo < 10) {   
	echo "
	<div class='percent'>
	<svg>
	  <circle class='circle' cx='70' cy='70' r='70'></circle>
	</svg>
	<div class='number'>
	  <h3>$winperclmo<span>%</span></h3>
	</div>
	<p>WINNING TP HIT</P>
	</div>
	<span class='center-show'>Giving Space Using this Property</span>
	";
	} 
	if ( $winperclmo >= 10 AND $winperclmo <= 50 ) {   
		echo "
		<div class='percent'>
		<svg>
		  <circle class='circle1' cx='70' cy='70' r='70'></circle>
		</svg>
		<div class='number'>
		  <h3>$winperclmo<span>%</span></h3>
		</div>
		<p>WINNING TP HIT</P>
		</div>
		<span class='center-show'>Giving Space Using this Property</span>
		";
	} 
	if ( $winperclmo > 50) {   
			echo "
			<div class='percent'>
			<svg>
			  <circle class='circle3' cx='70' cy='70' r='70'></circle>
			</svg>
			<div class='number'>
			  <h3>$winperclmo<span>%</span></h3>
			</div>
			<p>WINNING TP HIT</P>
			</div>
			<span class='center-show'>Giving Space Using this Property</span>
			";
	} 

// ----------TP NOT HIT-----------
if ( $tpnohitpeclmo < 10) {   
	echo "
	<div class='percent'>
	<svg>
	  <circle class='circle3' cx='70' cy='70' r='70'></circle>
	</svg>
	<div class='number'>
	  <h3>$tpnohitpeclmo<span>%</span></h3>
	</div>
	<p>TP NOT HIT</P>
	</div>
	<span class='center-show'>Giving Space Using this Property</span>	
	";
	} 
	if ( $tpnohitpeclmo >= 10 AND $tpnohitpeclmo <= 50 ) {   
		echo "
		<div class='percent'>
		<svg>
		  <circle class='circle1' cx='70' cy='70' r='70'></circle>
		</svg>
		<div class='number'>
		  <h3>$tpnohitpeclmo<span>%</span></h3>
		</div>
		<p>TP NOT HIT</P>
		</div>
		<span class='center-show'>Giving Space Using this Property</span>
		";
	} 
	if ( $tpnohitpeclmo > 50) {   
			echo "
			<div class='percent'>
			<svg>
			  <circle class='circle' cx='70' cy='70' r='70'></circle>
			</svg>
			<div class='number'>
			  <h3>$tpnohitpeclmo<span>%</span></h3>
			</div>
			<p>TP NOT HIT</P>
			</div>
			<span class='center-show'>Giving Space Using this Property</span>
			";
	}

echo "<center class='binary-cen'><br>
<br>
<div class='binary-data'>
<br>
<br>
FOREX POINTS EARNED: $forexpointstotallmo points
<br>
BINARY POINTS EARNED: $binarypointstotallmo points
<br>
<br>
<br>
</div>
</center>";




//////////////////////////////////////////////////////////////////////////////////////
//-------------------------------All Time Code------------------------------------------

echo "<p>
<br>
<br>
<br>
<p class='binary-cen'>
****** ALL TIME From 31/01/2021 ******
</p>
<br>
<br>
</p>";


// ----------Total Signals All Time-----------
if (  $totalsignalsall < 10) {   
echo "
<div class='percent'>
<svg>
  <circle class='circle' cx='70' cy='70' r='70'></circle>
</svg>
<div class='number'>
  <h3> $totalsignalsall</h3>
</div>
<p>TOTAL SIGNALS</P>
</div>
<span class='center-show'>Giving Space Using this Property</span>
";
} 
if (  $totalsignalsall >= 10 AND  $totalsignalsall <= 50 ) {   
	echo "
	<div class='percent'>
	<svg>
	  <circle class='circle1' cx='70' cy='70' r='70'></circle>
	</svg>
	<div class='number'>
	  <h3> $totalsignalsall</h3>
	</div>
	<p>TOTAL SIGNALS</P>
	</div>
	<span class='center-show'>Giving Space Using this Property</span>
	";
} 
if (  $totalsignalsall > 50) {   
		echo "
		<div class='percent'>
		<svg>
		  <circle class='circle3' cx='70' cy='70' r='70'></circle>
		</svg>
		<div class='number'>
		  <h3> $totalsignalsall</h3>
		</div>
		<p>TOTAL SIGNALS</P>
		</div>
		<span class='center-show'>Giving Space Using this Property</span>
		";
} 

// ----------WINNING SIGNALS TP HIT-----------
if ( $winpercall < 10) {   
	echo "
	<div class='percent'>
	<svg>
	  <circle class='circle' cx='70' cy='70' r='70'></circle>
	</svg>
	<div class='number'>
	  <h3>$winpercall<span>%</span></h3>
	</div>
	<p>WINNING TP HIT</P>
	</div>
	<span class='center-show'>Giving Space Using this Property</span>
	";
	} 
	if ( $winpercall >= 10 AND $winpercall <= 50 ) {   
		echo "
		<div class='percent'>
		<svg>
		  <circle class='circle1' cx='70' cy='70' r='70'></circle>
		</svg>
		<div class='number'>
		  <h3>$winpercall<span>%</span></h3>
		</div>
		<p>WINNING TP HIT</P>
		</div>
		<span class='center-show'>Giving Space Using this Property</span>
		";
	} 
	if ( $winpercall > 50) {   
			echo "
			<div class='percent'>
			<svg>
			  <circle class='circle3' cx='70' cy='70' r='70'></circle>
			</svg>
			<div class='number'>
			  <h3>$winpercall<span>%</span></h3>
			</div>
			<p>WINNING TP HIT</P>
			</div>
			<span class='center-show'>Giving Space Using this Property</span>
			";
	} 

// ----------TP NOT HIT-----------
if ( $tpnohitpecall < 10) {   
	echo "
	<div class='percent'>
	<svg>
	  <circle class='circle3' cx='70' cy='70' r='70'></circle>
	</svg>
	<div class='number'>
	  <h3>$tpnohitpecall<span>%</span></h3>
	</div>
	<p>TP NOT HIT</P>
	</div>
	<span class='center-show'>Giving Space Using this Property</span>	
	";
	} 
	if ( $tpnohitpecall >= 10 AND $tpnohitpecall <= 50 ) {   
		echo "
		<div class='percent'>
		<svg>
		  <circle class='circle1' cx='70' cy='70' r='70'></circle>
		</svg>
		<div class='number'>
		  <h3>$tpnohitpecall<span>%</span></h3>
		</div>
		<p>TP NOT HIT</P>
		</div>
		<span class='center-show'>Giving Space Using this Property</span>
		";
	} 
	if ( $tpnohitpecall > 50) {   
			echo "
			<div class='percent'>
			<svg>
			  <circle class='circle' cx='70' cy='70' r='70'></circle>
			</svg>
			<div class='number'>
			  <h3>$tpnohitpecall<span>%</span></h3>
			</div>
			<p>TP NOT HIT</P>
			</div>
			<span class='center-show'>Giving Space Using this Property</span>
			";
	}

echo "<center class='binary-cen'><br>
<br>
<div class='binary-data'>
<br>
<br>
FOREX POINTS EARNED: $forexpointstotalmo points
<br>
BINARY POINTS EARNED: $binarypointstotalmo points
<br>
<br>
<br>
</div>


</center>";


dbclose($link);

//echo "File end";
?>
<br>
<br><br>
<center class='binary-cen'><a href="https://play.google.com/store/apps/details?id=j.aerotech.moneymachinecash"><img src="https://moneymachinecash.club/a/banner-playstore.png"></a></center>
<br><br>
<br>
<p class='binary-cen'>
© 2021 MMC Signals Provider. All rights Reserved
</p>

</body>
<center>
</html>