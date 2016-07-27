<?php
		namespace Utils;

		/**
		 * Class RandomStringGenerator
		 * @package Utils
		 *
		 * Solution taken from here:
		 * http://stackoverflow.com/a/13733588/1056679
		 */
		class RandomStringGenerator
		{
		    /** @var string */
		    protected $alphabet;

		    /** @var int */
		    protected $alphabetLength;


		    /**
		     * @param string $alphabet
		     */
		    public function __construct($alphabet = '')
		    {
		        if ('' !== $alphabet) {
		            $this->setAlphabet($alphabet);
		        } else {
		            $this->setAlphabet(
		                  implode(range('a', 'z'))
		                . implode(range('A', 'Z'))
		                . implode(range(0, 9))
		            );
		        }
		    }

		    /**
		     * @param string $alphabet
		     */
		    public function setAlphabet($alphabet)
		    {
		        $this->alphabet = $alphabet;
		        $this->alphabetLength = strlen($alphabet);
		    }

		    /**
		     * @param int $length
		     * @return string
		     */
		    public function generate($length)
		    {
		        $token = '';

		        for ($i = 0; $i < $length; $i++) {
		            $randomKey = $this->getRandomInteger(0, $this->alphabetLength);
		            $token .= $this->alphabet[$randomKey];
		        }

		        return $token;
		    }

		    /**
		     * @param int $min
		     * @param int $max
		     * @return int
		     */
		    protected function getRandomInteger($min, $max)
		    {
		        $range = ($max - $min);

		        if ($range < 0) {
		            // Not so random...
		            return $min;
		        }

		        $log = log($range, 2);

		        // Length in bytes.
		        $bytes = (int) ($log / 8) + 1;

		        // Length in bits.
		        $bits = (int) $log + 1;

		        // Set all lower bits to 1.
		        $filter = (int) (1 << $bits) - 1;

		        do {
		            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));

		            // Discard irrelevant bits.
		            $rnd = $rnd & $filter;

		        } while ($rnd >= $range);

		        return ($min + $rnd);
		    }
		}


		function crypto_rand_secure($min, $max)
		{
		    $range = $max - $min;
		    if ($range < 1) return $min; // not so random...
		    $log = ceil(log($range, 2));
		    $bytes = (int) ($log / 8) + 1; // length in bytes
		    $bits = (int) $log + 1; // length in bits
		    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
		    do {
		        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
		        $rnd = $rnd & $filter; // discard irrelevant bits
		    } while ($rnd >= $range);
		    return $min + $rnd;
		}

		function getToken($length)
		{
		    $token = "";
		    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
		    $codeAlphabet.= "0123456789";
		    $max = strlen($codeAlphabet) - 1;
		    for ($i=0; $i < $length; $i++) {
		        $token .= $codeAlphabet[crypto_rand_secure(0, $max)];
		    }
		    return $token;
		}

		function generateUNID($length) {
		    //$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $characters = '0123456789ABCDEFGHJKLMNPQRSTUVWXYZ';
		    $randomString = '';
		    for ($i = 0; $i < $length; $i++) {
		        $randomString .= $characters[rand(0, strlen($characters) - 1)];
		    }
		    return $randomString;
		}

		function generateUser(){
		  // inputs
		    $emdomains = array("gmail.com","yahoo.com","hotmail.com","hotmail.co.uk","facebook.com","yahoo.co.uk","googlemail.com");
		    $surnames = array("smith","jones","collins","patel","gupta","roberts","johnson","chong","ching","chu","stephens","banks","campbell","jones");
		    $firstnames = array("eric","john","angela","stephen", "chris","rachel","carlos");
		    $alpha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		  //outputs
		    $middle = $alpha[rand(0,strlen($alpha)-1)];
		    $phonenumber =  "447". rand(500,997). rand(100,300). rand(100,999) ."";
		    $fullname = $firstnames[rand(0,count($firstnames)-1)] .".$middle.". $surnames[rand(0,count($surnames)-1)];
		    $email_addr = $fullname . "@" . $emdomains[rand(0,6)];
		    $msg_code = rand(1,20);
		    $ftimestamp = date('Y-m-d H:i:s');
		    $unid = uniqid('drg:');

		    return(array(
		      "FULLNAME" => strtolower($fullname),
		      "EMAIL" => strtolower($email_addr),
		      "PHONENUMBER" => $phonenumber));
		}

		function constructInsert($parameters,$tablename){

		    $statement = "INSERT INTO $tablename "; 
		    $statement .= " (`".implode("`, `", array_keys($parameters))."`)";
		    $statement .= " VALUES ( '".implode("', '", ($parameters))."')";
		    return ($statement);
		}


		function logStatus($statusMsg){
		  global $logName, $scriptName;
		      error_log($scriptName." | ".date('Y-m-d h:i:s')." | ".$statusMsg, 0);
		      error_log(date('Y-m-d h:i:s')." | ".$statusMsg."\n",3, $logName );
		      return ($statusMsg);
		}

		function reportCondition($what){
		    $i=0;
		    foreach ($what as $key => $value) {
		        $a[$i]=$value;
		        // $a[$i]=[
		        //       "code" => $a[0],
		        //       "timestamp" => $date
		        //   ];
		        $output = $i++." : ".$key." = ".$value."<br/>";
		        echo logStatus($output);
		  }
		  return($a);
		}

		function generateTrip(){
		  // inputs

		    $verbs = array("gmail.com","yahoo.com","hotmail.com","hotmail.co.uk","facebook.com","yahoo.co.uk","googlemail.com");
		    
		    $surnames = array("smith","jones","collins","patel","gupta","roberts","johnson","chong","ching","chu","stephens","banks","campbell","jones");

		    $firstnames = array("eric","john","angela","stephen", "chris","rachel","carlos");

		     $alpha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
		  //outputs

		    $middle = $alpha[rand(0,strlen($alpha)-1)];
		    $phonenumber =  "447". rand(500,997). rand(100,300). rand(100,999) ."";
		    $fullname = $firstnames[rand(0,count($firstnames)-1)] .".$middle.". $surnames[rand(0,count($surnames)-1)];
		    $email_addr = $fullname . "@" . $verbs[rand(0,count($verbs)-1)];
		    $msg_code = rand(1,20);
		    $ftimestamp = date('Y-m-d H:i:s');
		    $unid = uniqid('drg:');

		    //-----------------------------------------
		    $unid = generateUNID(12);

		    $message = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

		    $message = $fullname."\r\n";


		     $vehicleTypes = array(
		      array(4, "UGH01","4-seater"),
		      array(5, "UGH02","6-seater"),
		      array(7, "UGH03","8-seater"),
		      array(9, "UGH04","10-seater"),
		      array(11, "UGH05","12-seater"),
		      array(15, "UGH06","16-seater")
		      );

		     $vehicleRadix = rand(0,count($vehicleTypes)-1);
		     $vehicleType = $vehicleTypes[$vehicleRadix][2];
		    
		     $origin = "NA";
		     $destination ="NA";
		     $originLatLong = "54.32430";
		     $destinationLatLong = "-2.545";

		     $luggage = 0;
		     $seats = rand(1,$vehicleTypes[$vehicleRadix][0]);
		     $children = rand(0,$vehicleTypes[$vehicleRadix][0]-$seats); 

		     $departureDate = date('Y-m-d', strtotime('+1 week'));
		     $departureTime = "";

		    return (array(
		          "unid" => $unid,
		          "customer_unid" => "AJAX_SCRIPT",
		          "booked" => time(),
		          "departureDate" => $departureDate,
		          "departureTime" => $departureTime,
		          "origin" => $origin,
		          "destination" => $destination,
		          "vehicleType" => $vehicleType,
		          "seats" => $seats,
		          "children" => $children,
		          "luggage" => $luggage,
		          "message" => $message
		          )
		      );
		}