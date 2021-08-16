<?php

//Check for php version and stop if it is not 5.6 or above.
$pv = phpversion();
$pva = explode(".",$pv);
$pvacnt = count($pva);
if($pvacnt < 2)
{
	echo "<b>ERROR!</b> Cannot read the PHP version. Cannot proceed.";
	exit;
}
$p1 = intval($pva[0]);
$p2 = intval($pva[1]);


if($pv > 5)
{
	//OK to proceed
}
else
{
	if($p1 == 5 AND $p2 >= 6)
	{
		//OK to proceed
	}
	else
	{
		echo "<b>ERROR!</b> You are using PHP version $pv. This application needs PHP 5.6 or higher. Cannot proceed.";
		exit;
	}
}

$dbhost = "localhost";   //Host of the DataBase
$dbname = "ikspjlmt_moneymachine";   //DB Name
$dbuser = "ikspjlmt_moneymachin";   //DB user name
$dbpwd = "99mcRq8=rn3#";    //DB user password

$baseurl = "https://moneymachinecash.club/a/"; //Based URL where all your files are uploaded


$sitename= "MoneyMachinCash.club "; //Give any name to your reports site

$siteslogan = "Money Machine Cash Club"; //This is the statement that shows below the page title

$pagekeywords = "";
$pagedesc = "";
$pagetitle = "";
$pagecontent = "";

$noreply_mail = "noreply@moneymachinecash.club"; //Email that is used for sending mails. Must be a real email with your own domain name.

//Tracking code
$tracking = <<<HTM



HTM;
//Notification URL$notif_url="https://moneymachinecash.club/api/sendNotification.php";//Key$apikey="3rRKSNaPB3sLAJdD2XzWNaRAQv2528G3dnfUwPT2EJDDwH8rurjr5FFnGwS5dccr";



?>