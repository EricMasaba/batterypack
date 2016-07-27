<?php
	$debug = 0;
	date_default_timezone_set('Europe/London'); 
	$date = date('m/d/Y h:i:s a', time());
	$currentYear = $date1=date('Y');

//-----------------------------------------------------------------
define ("__ROOT__", dirname(dirname(__FILE__)) ); // "localhost/clients/alpha/nf4/"

	$root = __ROOT__; // "localhost/clients/alpha/nf4/"; 
	$home = "home.php";
	$index = "index.php";
	$scriptformat = "\n<script>\n%s\n</script>\n";

	$hostname ="localhost";
	$conn= "";

// Database

/*
define ('__DBNAME__' , 'mamaerco_neales');
define ('__DBUSERNAME__' , 'mamaerco_admin00');
define ('__DBPASSWORD__' , 'get!S0me');
*/

define ('__DBNAME__' , 'test');
define ('__DBUSERNAME__' , 'admin');
define ('__DBPASSWORD__' , '');


//Google
define ("GOOGLE_TRACKING_ID","UA-63632244-1");	
define ("GOOGLE_API_KEY", "AIzaSyCLgImR83QzBOorVMBjEV5xAVpvG-L5PLw");
define ("GOOGLE_MAPS_KEY","AIzaSyCf6bDITip0oOGgF8H134MTqs8W5CVtSkg");
define ("GOOGLE_TAG_MANAGER","GTM-TQS4XM");

// PCA Predict
define ("PCAPREDICT_KEY","MAMAE11113");

// Ideal Postcodes
define ("IDEALPOSTCODES_KEY","");

// MailChimp + Mandrill
define ("MC_API_ID","c64c79f31d5dd226ad61be9b0f427868-us11");
define ("LIST_ID","1ede77f95a");

/* SMS */

	// AQL
	define ("SMSAPI_USERNAME","nealest");
	define ("SMSAPI_PASSWORD","0p878");

	// Clickatell (nealestransport@outlook.com)
	define ("SMS_API_USERNAME1","nealesdrt");
	define ("SMS_API_PASSWORD1","aKo59iMs");

	/*
			Clickatell - Client ID: MEAY62 
			Username: transitexchange 
			Password: SNSBVePMWGRbSZ
	*/
	define ("SMS_API_USERNAME2","transitexchange");
	define ("SMS_API_PASSWORD2","SNSBVePMWGRbSZ");

	// Twilio

// Database
// Connection Details
//$dbname = 'mamaerco_neales';
//$username = 'mamaerco_neales';
//$password = 'get!S0me';


/*
	AWS SMTP | AWS User: ses-smtp-user.20150810-173137
*/
define ("SMTP_AUTHUSERNAME", "AKIAITLTKO4HMHTA5ZCA");
define ("SMTP_AUTHPASSWORD","Ag7+aivrkYOvmYaDb1+22FRQ1qrgEhjUlbPJEL3pJwLg");
define ("SMTP_HOST","email-smtp.eu-west-1.amazonaws.com");
define ("SMTP_PORT","587");

/*STRIPE*/
define ('STRIPE_LIVE_SECRET_KEY', '');
define ('STRIPE_LIVE_PUBLISHABLE_KEY', '');
define ('STRIPE_TEST_SECRET_KEY', 'sk_test_');
define ('STRIPE_TEST_PUBLISHABLE_KEY', 'pk_test_');

/*INVOICE TYPES*/
define ("BILLTYPE_QUOTE", 0);
define ("BILLTYPE_INVOICE", 1);
define ("BILLTYPE_RECEIPT", 2);

// Customer Details
define ("FIRM_NAME", "Neales");
define ("FIRM_TLD","nealesdrt.co.uk");
define ("FIRM_URL","http://www.nealesdrt.co.uk");
define ("FIRM_EMAIL_BOOKING","bookings");
define ("FIRM_CODE","nft");
define ("FIRM_EMAIL_ADDR","info");
define ("FIRM_DEFAULT_EMAIL","info");
define ("FIRM_NUMBER","441494522555");
define ("FIRM_VOICE","441494522555");
define ("FIRM_SMS","441494372860");

define ("__TEST_EMAIL_ADDR","eric.masaba@gmail.com");
define ("__TEST_EMAIL_ADDR2","abrar.hussain.hw@gmail.com");

define ("FIRM_ADDRESS_LINE1","6 – 8 Corporation Street");
define ("FIRM_ADDRESS_LINE2","High Wycombe");
define ("FIRM_ADDRESS_LINE3","BUCKS");
define ("FIRM_ADDRESS_LINE4","UK");
define ("FIRM_POSTCODE","HP13 6TQ");
define ("FIRM_IBAN","GB11LOYD30942855663868");
define ("FIRM_SWIFT","LOYDGB11");
define ("FIRM_SORTCODE","30-94-28");
define ("FIRM_ACCOUNTNUM","55663868");
define ("FIRM_BANK","ROYAL BANK OF SCOTLAND");
define ("FIRM_ACCOUNTNAME","NEALES COACHES LTD");
define ("FIRM_LEGALNAME","NEALES COACHES LTD");
define ("FIRM_DOI","1975");

/*
------------------------------------------------------------------------------------
Make Variables
----------------------------------------------------------
*/

$host = SMTP_HOST;
$port = SMTP_PORT;
$firmSMTPAuthUsername = SMTP_AUTHUSERNAME;
$firmSMTPAuthpassword = SMTP_AUTHPASSWORD;

// DB Connection
$databaseName = __DBNAME__;
$dbname = __DBNAME__;
$username = __DBUSERNAME__;
$password = __DBPASSWORD__ ;

$smsAPIusername = SMS_API_USERNAME1;
$smsAPIpassword = SMS_API_PASSWORD1;

$firmName = FIRM_NAME; 
$firmEmail = FIRM_EMAIL_ADDR;
$firmURL = FIRM_URL;
//-----------------------------------------------------------------
$firmName = FIRM_NAME;
$firmEmail = "bookings".FIRM_TLD;
//------------------------------------------
$firmURL = FIRM_URL;
$firmLogo = "img/logo.png";
$firmIcon = "favicon.ico";
//------------------------------------------
$firmAddressLine1 = FIRM_ADDRESS_LINE1;
$firmAddressLine2 = FIRM_ADDRESS_LINE2;
$firmAddressLine3 = FIRM_ADDRESS_LINE3;
$firmAddressLine4 = FIRM_ADDRESS_LINE4;
$firmPostCode = FIRM_POSTCODE;
//------------------------------------------
$firmClientID = FIRM_URL . "/contact";
$firmEmailBooking = "bookings".FIRM_TLD;
$firmEmailSupport = "bookings".FIRM_TLD;
$firmReplyTo = "bookings".FIRM_TLD; 
//------------------------------------------
$firmNumber = FIRM_NUMBER;
$firmBooking = FIRM_VOICE;
$firmMobile = FIRM_SMS;
//------------------------------------------
// Banking Details
$firmIBAN = FIRM_IBAN;
$firmSWIFT = FIRM_SWIFT;
$firmSortcode = FIRM_SORTCODE;
$firmAccountNumber = FIRM_ACCOUNTNUM;
$firmBank = FIRM_BANK;
$firmAccountName = FIRM_ACCOUNTNAME;
$firmLegalName = FIRM_LEGALNAME;
$founded = FIRM_DOI;
//--------------------------------------------
$firmBookingAgentTitle = "Automated Booking";
$firmBookingURL = "book.php";
$firmTripsURL = "book.php";
$firmTopUpURL = "book.php";

$commands = [
"main" => "index.php",
"home" => "home.php",
"book" => "book.php",
"profile" => "profile.php",
"login" => "login.php",
"logout" => "logout.php?logout=1",
"topup" => "topup.php",
"about" => "about.php"
];


$commandands = array(
  'main'  => array('text'=>'main',  'url'=>'home.php'),
  'home' => array('text' =>'home', 'url'=>'home.php'),
  'profile' => array('text' =>'profile', 'url'=>'profile.php'),
  'index' => array('text' =>'index', 'url'=>'index.php'),
  'book'  => array('text'=>'book',  'url'=>'book.php'),
  'fares' => array('text'=>'fares', 'url'=>'fares.php'),
  'zones' => array('text'=>'zones', 'url'=>'zones.php'),
  'signup' => array('text'=>'signup', 'url'=>'signup.php'),
  'login' => array('text'=>'login', 'url'=>'login.php'),
  'logout' => array('text'=>'logout', 'url'=>'logout.php?logout=true') 
);
