<?php

	class Navbar {
	  public static function GenerateMenu($items) {
	    $html = "<ul class=\"nav navbar-nav navbar-right\">\n";
	    foreach($items as $item) {

		  $html .= "\t<li>";
	      $html .= "<a href='{$item['url']}'>{$item['text']}</a>\n";
		  $html .= "\t</li>\n";      
	    }

	    $html .= "</ul>\n";
	    return $html;
	  }
	};

	class WithinNavbar {
	  public static function GenerateMenu($items) {
	    $html = "\n";
	    foreach($items as $item) {

	    $html .= "\t<li>";
	      $html .= "<a href='{$item['url']}'>{$item['text']}</a>\n";
	    $html .= "\t</li>\n";      
	    }

	    $html .= "\n";
	    return $html;
	  }
	};


    class GDB
    {   

        private $host = "localhost";
        private $dbname = __DBNAME__;
        private $username = __DBUSERNAME__;
        private $password = __DBPASSWORD__;

        public $conn;
         
        public function dbConnection()
    	{
         
    	    $this->conn = null;    
            try
    		{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);
    			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
            }
    		catch(PDOException $exception)
    		{
                echo "Connection error: " . $exception->getMessage();
            }
             
            return $this->conn;
        }
    }

	function loadedMessage($context,$tagID){
		$scriptformat = "\n<script>\n%s\n</script>\n";
		$messageFormat = "console.log(\"%s Loaded for %s\");";
		return (sprintf($scriptformat,sprintf($messageFormat,$context, $tagID))) ;
	}

	function addScripts($scriptlist="js/noscripts.js"){
		$scriptformat = "\n<script>\n%s\n</script>\n";
		$scriptAddformat = "<script src=\"%s\"></script>\n";
		
		foreach ($scriptlist as $key => $value) {
			echo sprintf($scriptAddformat,$value);
		}

	}

	function googleMaps($googleMapsID,$callback=""){
		$scriptformat = "\n<script>\n%s\n</script>\n";
		$scriptAddformat = "<script src=\"%s\"></script>\n";		
		return sprintf($scriptAddformat, sprintf("https://maps.googleapis.com/maps/api/js?key=%s",$googleMapsID));
		echo loadedMessage("GoogleMaps",$googleMapsID);
	}

	function googleMapsAPI($googleMapsID,$callback=""){
		return sprintf("https://maps.googleapis.com/maps/api/js?key=%s",$googleMapsID);
		echo loadedMessage("GoogleMaps API code",$googleMapsID);
	}	

	function googleTagManager($gtmID)	{
		$scriptformat = "\n<script>\n%s\n</script>\n";

		$gtm = "
		<!-- Google Tag Manager -->
		<noscript><iframe src=\"//www.googletagmanager.com/ns.html?id=%1\$s\"
		height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','%1\$s');</script>
		<!-- End Google Tag Manager -->
	";
	
	// echo sprintf($scriptformat,sprintf($gtm,$gtmID));
	echo sprintf("%s",sprintf($gtm,$gtmID));
	echo loadedMessage("GoogleTagManager",$gtmID);
	// echo sprintf($scriptformat,"console.log(\"GoogleTagManager Loaded for ".$gtmID."\");");
	}

	function googleAnalytics($gaID){
		$scriptformat = "\n<script>\n%s\n</script>\n";

		$ga = "  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');\n
		ga('create', '%s', 'auto');
		ga('send', 'pageview');\n
		";

		echo sprintf($scriptformat,sprintf($ga,$gaID) );		
		echo loadedMessage("GoogleAnalytics",$gaID);
	}

	function pcaPredict($accountKey){

		$pca = "
		<script>(function (a, c, b, e) {
		    a[b] = a[b] || {}; a[b].initial = { accountCode: \"%1\$s\", host: \"%1\$s.pcapredict.com\" };
		    a[b].on = a[b].on || function () { (a[b].onq = a[b].onq || []).push(arguments) }; var d = c.createElement(\"script\");
		    d.async = !0; d.src = e; c = c.getElementsByTagName(\"script\")[0]; c.parentNode.insertBefore(d, c)
		})(window, document, \"pca\", \"//%1\$s.pcapredict.com/js/sensor.js\");</script>
	";

	echo sprintf($pca,$accountKey);
	echo loadedMessage("PCA Code",$accountKey);

	}

