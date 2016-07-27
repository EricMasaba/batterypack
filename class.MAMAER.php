<?php

class Formatter
{
    // property declaration
    public $telephone = '441494372860';

    // method declaration
    public function displayVar() {
        echo substr('abcdef', 1, 3);  // bcd
        echo $this->var;
    }

    public function humanReadable($phoneNumber,$formatType){
        $format = "+%s (0) %s %s %s";

        if ($formatType=="1"){
            $result = sprintf($format,
            substr($phoneNumber, 0, 2),
            substr($phoneNumber, 2, 4),
            substr($phoneNumber, 6, 3),
            substr($phoneNumber, 9, 3));

        } elseif ($formatType=="2"){
            $format = "0%s %s %s";
            $format = "+%s (0) %s %s %s";
            $result = vsprintf($format,
                array(
                    substr($phoneNumber, 0, 2),
                    substr($phoneNumber, 2, 3),
                    substr($phoneNumber, 5, 4),
                    substr($phoneNumber, 9, 3)
                    )
                );
       
        } elseif ($formatType=="3"){
            $format = "+%s (0) %s %s %s";
            $result = vsprintf($format,
                array(
                    substr($phoneNumber, 0, 2),
                    substr($phoneNumber, 2, 3),
                    substr($phoneNumber, 5, 3),
                    substr($phoneNumber, 8, 4)
                    )
                );    

        } elseif ($formatType=="4"){
            $format = "0%s %s %s";
            $result = vsprintf($format,
                array(
                    substr($phoneNumber, 2, 3),
                    substr($phoneNumber, 5, 3),
                    substr($phoneNumber, 8, 4)
                    )
                );
       
        } elseif ($formatType=="5"){
            $format = "0%s %s %s %s";
            $result = vsprintf($format,
                array(
                    substr($phoneNumber, 2, 4),
                    substr($phoneNumber, 6, 2),
                    substr($phoneNumber, 8, 2),
                    substr($phoneNumber, 10, 2)
                    )
                );
       
        } elseif ($formatType=="6"){
            $format = "0%s %s %s %s %s";
            $result = vsprintf($format,
                array(
                    substr($phoneNumber, 2, 2),
                    substr($phoneNumber, 4, 2),
                    substr($phoneNumber, 6, 2),
                    substr($phoneNumber, 8, 2),
                    substr($phoneNumber, 10, 2)
                    )
                );
       
        } else {                                                    // 0 TEL_NUMBER_NORMAL
            $format = "%s";
            $result = vsprintf($format,
            substr($phoneNumber, 0, 12));
        }

//        echo "$phoneNumber <br> $result";
        return ($result);
    }

}

class MMaker
{
        public function examineMessage($inputMessage, $serviceList, &$outcome){
               
                $sourceMessage = strtolower($inputMessage);

                // Find Word List Matches
                $lastPos = 0;
                $positions = array();

                foreach ($serviceList as $needle){
                  while (($lastPos = strpos($sourceMessage, "#".strtolower($needle), $lastPos))!== false) {
                        $positions[] = $lastPos;
                        $lastPos = $lastPos + strlen($needle);
                  }
                }
                    $pattern = '/[a-z0-9._\-\+]+@[a-z0-9\-]+\.([a-z]{2,3})(?:\.[a-z]{2})?/i';  // email address
                    preg_match_all($pattern, $sourceMessage, $matches);
                    $outcome = $matches[0];
                    return (1);
                }

        public function extractWordlists($source, $wordList){

                $sourceMessage = strtolower($source);

                // Find WordList Matches (e.g. Airports or Schools)
                $lastPos = 0;
                $oldPos = 0;
                $positions = array();
                /*
                for ($p=0;$p<count($wordList);$p++){
                  $needle = $wordList[$p];
                  while (($lastPos = strpos($sourceMessage, "#".strtolower($needle), $lastPos))!== false) {
                    $positions[] = $lastPos;
                    $grabbed[]=$p; //substr($source,1+$lastPos,strlen($needle));
                    $lastPos = $lastPos + strlen($needle);
                  }
                }
                */

                foreach ($wordList as $needle){ 
                  while (($lastPos = strpos($sourceMessage, "#".strtolower($needle), $lastPos))!== false) {
                    $grabbed[] = strtoupper(substr($source,1+$lastPos,strlen($needle)));
                    $apositions[] = array($grabbed[count($grabbed)-1] => $lastPos + 0);
                    $positions[] = $lastPos;
                    $lastPos = $lastPos + strlen($needle);
                  }
                }
                arsort($apositions,$sort_flags=SORT_NUMERIC);

                // Find Email Addresses
                $pattern = '/[a-z0-9._\-\+]+@[a-z0-9\-]+\.([a-z]{2,3})(?:\.[a-z]{2})?/i';
                preg_match_all($pattern, $sourceMessage, $matches);
                $outcome = GetStringProcInfo(strlen($sourceMessage),$matches[0], $positions);
                $outcome->matched = $grabbed;
                $outcome->worded = $apositions;
                return ($outcome);  
        }

        public function dbSQLinsertStatement($parameters,$tablename){
                $statement = "INSERT INTO $tablename "; 
                $statement .= " (`".implode("`, `", array_keys($parameters))."`)";
                $statement .= " VALUES ( '".implode("', '", ($parameters))."')";
                return ($statement);
            }

        public function dbSQLexecute($statement,$credentials){

                $dbname = $credentials["database"];
                $username = $credentials["user"];
                $password = $credentials["password"];

                try {
                        $conn = new PDO('mysql:host=localhost;dbname='.$dbname, $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                       
                        # Prepare the query ONCE
                        $stmt = $conn->prepare($statement);
                        $stmt->execute();
                 
                } catch(PDOException $e) {

                echo (logStatus($e->getMessage()));

                }
                 $conn = NULL;
            }


        public function logStatus($statusMsg){
              global $logName, $scriptName;
                  error_log($scriptName." | ".date('Y-m-d h:i:s')." | ".$statusMsg, 0);
                  error_log(date('Y-m-d h:i:s')." | ".$statusMsg."\n",3, $logName );
                  return ($statusMsg);
            }

        }

    class SimpleClass
    {
        // property declaration
        public $var = 'a default value';

        // method declaration
        public function displayVar() {
            echo $this->var;
        }
    }


/** 
 * sms_inject 
 * 
 * @package gammu smsd class 
 * @author ikhsan agustian <ikhsan017@gmail.com> 
 * @license Distributed under GNU/GPL 
 * @version 0.1 
 * @access public 
 */ 

class sms_inject 
{ 
    private $error, $res, $msg, $dest, $udh, $msg_part, $sendingDateTime; //msg_part array of couple udh + msg 
    
    /** 
     * sms_inject::__construct() 
     * @usage object constructor 
     * @param mysql link resource $res 
     * @return void 
     */ 
    function __construct($res) //throw mysql resource as argument 
    { 
        $this->udh=array( 
        'udh_length'=>'05', //sms udh lenth 05 for 8bit udh, 06 for 16 bit udh 
        'identifier'=>'00', //use 00 for 8bit udh, use 08 for 16bit udh 
        'header_length'=>'03', //length of header including udh_length & identifier 
        'reference'=>'00', //use 2bit 00-ff if 8bit udh, use 4bit 0000-ffff if 16bit udh 
        'msg_count'=>1, //sms count 
        'msg_part'=>1 //sms part number 
        ); 
        $this->msg_part=array(); 
        $this->res=$res; 
        $this->error=array(); 
    } 
    
    
    /** 
     * sms_inject::mass_sms() 
     * @usage tell gammu-smsd to send one sms to many recipient 
     * @param string $msg 
     * @param array $dest 
     * @param string $sender 
     * @return void 
     */ 
    function mass_sms($msg,$dest,$sender='',$sendingDateTime='') 
    { 
        $this->msg=$msg; 
        $this->create_msg(); 
        if(!is_array($dest)) 
        { 
            $this->send_sms($msg,$dest,$sender,$sendingDateTime); 
        } 
        else 
        { 
            foreach($dest as $dst) 
            { 
                $this->send_sms($msg,$dst,$sender,$sendingDateTime); 
            } 
        } 
    } 
    
    
    /** 
     * sms_inject::send_sms() 
     * @usage tell gammu-smsd to send sms to sepcified phone number 
     * @param string $msg 
     * @param string $dest 
     * @param string $sender 
     * @return false if error 
     */ 
    function send_sms($msg,$dest,$sender='',$sendingDateTime='') 
    { 
        if(!$dest) 
        { 
            $this->error[]='No destination number defined'; 
            return false; 
        } 
        $this->msg=$msg; 
        $this->dest=$dest; 
        $this->sendingDateTime=$sendingDateTime; 
        $this->create_msg(); 
        //uncomment to get preview 
        //echo "<pre>Destination : $this->dest\nSender : $sender\nMessage :\n";print_r($this->msg_part); 
        $this->inject($sender); 
    } 
    
    
    /** 
     * sms_inject::inject() 
     * @usage insert previously created sms part to database 
     * @param string $sender 
     * @return void 
     */ 
    private function inject($sender='') 
    { 
        $multipart=(count($this->msg_part) > 1)?'true':'false'; 
        $id=''; 
        foreach($this->msg_part as $number => $sms) 
        { 
            if($number==1) 
            { 
                $query="insert into outbox (`UDH`,`SendingDateTime`,`DestinationNumber`,`TextDecoded`,`MultiPart`,`SenderID`) values ('{$sms['udh']}','{$this->sendingDateTime}','{$this->dest}','{$sms['msg']}','{$multipart}','$sender')"; 
                mysql_query($query,$this->res); 
                $id=mysql_fetch_assoc(mysql_query("select last_insert_id() as id",$this->res)); 
                $id=$id['id']; 
            } 
            else 
            { 
                $query="insert into outbox_multipart (`UDH`,`SequencePosition`,`TextDecoded`,`ID`) values ('{$sms['udh']}','{$number}','{$sms['msg']}','{$id}')"; 
                mysql_query($query,$this->res); 
            } 
        } 
    } 
    
    
    /** 
     * sms_inject::create_msg() 
     * @usage create sms message (and create udh if sms is multipart) 
     * @return void 
     */ 
    private function create_msg() 
    { 
        $x=1; 
        if(strlen($this->msg)<=160) //if single sms, send without udh 
        { 
            $this->msg_part[$x]['udh']=''; 
            $this->msg_part[$x]['msg']=$this->msg; 
        } 
        else //if multipart sms, split into 153 character each part 
        { 
            $msg=str_split($this->msg,153); 
            $ref=mt_rand(1,255); 
            $this->udh['msg_count']=$this->dechex_str(count($msg)); 
            $this->udh['reference']=$this->dechex_str($ref); 
            foreach($msg as $part) 
            { 
                $this->udh['msg_part']=$this->dechex_str($x); 
                $this->msg_part[$x]['udh']=implode('',$this->udh); 
                $this->msg_part[$x]['msg']=$part; 
                $x++; 
            } 
        } 
    } 
    
    
    /** 
     * sms_inject::dechex_str() 
     * @usage convert decimal to zerofilled hexadecimal 
     * @param integer $ref 
     * @return 2 digit hexa-decimal in string format 
     */ 
    private function dechex_str($ref) 
    { 
        return ($ref <= 15 )?'0'.dechex($ref):dechex($ref); 
    } 
} 

class SampleMaker 
{

    function generateUser()
    {
        $emdomains = array("gmail.com","yahoo.com","hotmail.com","hotmail.co.uk","facebook.com","yahoo.co.uk","googlemail.com");
        $surnames = array("smith","jones","collins","patel","gupta","roberts","johnson","chong","ching","chu","stephens","banks","campbell","jones");
        $firstnames = array("eric","john","angela","stephen", "chris","rachel","carlos");
        $alpha = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $middle = $alpha[rand(0,strlen($alpha)-1)];
        $phonenumber =  "447". rand(500,997). rand(100,300). rand(100,999) ."";
        $fullname = $firstnames[rand(0,count($firstnames)-1)] .".$middle.". $surnames[rand(0,count($surnames)-1)];
        $email_addr = $fullname . "@" . $emdomains[rand(0,6)];
        $msg_code = rand(1,20);
        $ftimestamp = date('Y-m-d H:i:s');
        $unid = uniqid('drg:');
    }
}
?>