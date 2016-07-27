<?php 
/*
https://gist.github.com/milesstewart88/64a1426456e12966d8b1
*/

echo "Script Begin";

function pullTheData( $url, $county) {
    $page = file_get_contents($url);
    $doc = new DOMDocument();
    $doc->loadHTML($page);
    $removal = array(
    	"in", 
    	"#",
		"Town",
		"Postcodes",
		"County",
		"Country",
		"England",
		$county
    );
	$buildArray = array();
    foreach ($doc->getElementsByTagName('td') as $node) {
        $array = explode(" ", trim(str_replace($removal, "", $node->nodeValue)));
        if ($array[0] == "") {}
        if (is_numeric($array[0])) {}
        if (count($array) == 2) {$buildArray[] = $array[0] . " " . $array[1];}       
        if (!is_numeric($array[0]) && $array[0] != "" ) {$buildArray[] = $array[0];}
    }
    return array_unique($buildArray);	
}
/**
 * Build json File
 */
function buildJSONFile($theJSON) {
	$folder 	= "c:/xampp/htdocs/_json";
	$fileName 	= "master.json";
	$filePath 	= join(DIRECTORY_SEPARATOR, array($folder, $fileName));
	if ( $theJSON ) {
		$writeFile = fopen($filePath, "w");
		fwrite($writeFile, json_encode($theJSON));
		fclose($writeFile);
	}
	echo $fileName . " has been written and moved to " . $folder;
}
/**
 * Run for all the towns
 */
function runForAllTowns( $array ) {
	$newArray =  array();
	foreach ($array as $town => $url) {
		$tempArray = pullTheData($url, $town);
		$newArray = array_merge($newArray, $tempArray);
	}
	buildJSONFile($newArray);
}
$townArray = array(
	"Bedfordshire" 				=> "http://www.townscountiespostcodes.co.uk/towns-in-england/bedfordshire/",
	"Berkshire" 				=> "http://www.townscountiespostcodes.co.uk/towns-in-england/berkshire/",
	"Bristol" 					=> "http://www.townscountiespostcodes.co.uk/towns-in-england/bristol/",
	"Buckinghamshire" 			=> "http://www.townscountiespostcodes.co.uk/towns-in-england/buckinghamshire/",
	"Cambridgeshire" 			=> "http://www.townscountiespostcodes.co.uk/towns-in-england/cambridgeshire/",
	"Cornwall" 					=> "http://www.townscountiespostcodes.co.uk/towns-in-england/cornwall/",
	"Cumbria" 					=> "http://www.townscountiespostcodes.co.uk/towns-in-england/cumbria/",
	"Derbyshire" 				=> "http://www.townscountiespostcodes.co.uk/towns-in-england/derbyshire/",
	"Devon" 					=> "http://www.townscountiespostcodes.co.uk/towns-in-england/devon/",
	"Dorset" 					=> "http://www.townscountiespostcodes.co.uk/towns-in-england/dorset/",
	"Durham" 					=> "http://www.townscountiespostcodes.co.uk/towns-in-england/durham/",
	"East Riding of Yorkshire" 	=> "http://www.townscountiespostcodes.co.uk/towns-in-england/east-riding-of-yorkshire/",
	"East Sussex" 				=> "http://www.townscountiespostcodes.co.uk/towns-in-england/east-sussex/",
	"Essex" 					=> "http://www.townscountiespostcodes.co.uk/towns-in-england/essex/",
	"Gloucestershire" 			=> "http://www.townscountiespostcodes.co.uk/towns-in-england/gloucestershire/",
	"Greater Manchester" 		=> "http://www.townscountiespostcodes.co.uk/towns-in-england/greater-manchester/",
	"Hampshire" 				=> "http://www.townscountiespostcodes.co.uk/towns-in-england/hampshire/",
	"Hereford and Worcester" 	=> "http://www.townscountiespostcodes.co.uk/towns-in-england/hereford-and-worcester/",
	"Hertfordshire" 			=> "http://www.townscountiespostcodes.co.uk/towns-in-england/hertfordshire/",
	"Isle of Man" 				=> "http://www.townscountiespostcodes.co.uk/towns-in-england/isle-of-man/",
	"Isle of Wight" 			=> "http://www.townscountiespostcodes.co.uk/towns-in-england/isle-of-wight/",
	"Kent" 						=> "http://www.townscountiespostcodes.co.uk/towns-in-england/kent/",
	"Lancashire" 				=> "http://www.townscountiespostcodes.co.uk/towns-in-england/lancashire/",
	"Leicestershire" 			=> "http://www.townscountiespostcodes.co.uk/towns-in-england/leicestershire/",
	"Lincolnshire" 				=> "http://www.townscountiespostcodes.co.uk/towns-in-england/lincolnshire/",
	"London" 					=> "http://www.townscountiespostcodes.co.uk/towns-in-england/london/",
	"Merseyside" 				=> "http://www.townscountiespostcodes.co.uk/towns-in-england/merseyside/",
	"Middlesex" 				=> "http://www.townscountiespostcodes.co.uk/towns-in-england/middlesex/",
	"Norfolk" 					=> "http://www.townscountiespostcodes.co.uk/towns-in-england/norfolk/",
	"North Yorkshire" 			=> "http://www.townscountiespostcodes.co.uk/towns-in-england/north-yorkshire/",
	"Northamptonshire" 			=> "http://www.townscountiespostcodes.co.uk/towns-in-england/northamptonshire/",
	"Northumberland" 			=> "http://www.townscountiespostcodes.co.uk/towns-in-england/northumberland/",
	"Nottinghamshire" 			=> "http://www.townscountiespostcodes.co.uk/towns-in-england/nottinghamshire/",
	"Oxfordshire" 				=> "http://www.townscountiespostcodes.co.uk/towns-in-england/oxfordshire/",
	"Rutland" 					=> "http://www.townscountiespostcodes.co.uk/towns-in-england/rutland/",
	"Shropshire" 				=> "http://www.townscountiespostcodes.co.uk/towns-in-england/shropshire/",
	"Somerset" 					=> "http://www.townscountiespostcodes.co.uk/towns-in-england/somerset/",
	"South Yorkshire" 			=> "http://www.townscountiespostcodes.co.uk/towns-in-england/south-yorkshire/",
	"Staffordshire" 			=> "http://www.townscountiespostcodes.co.uk/towns-in-england/staffordshire/",
	"Suffolk" 					=> "http://www.townscountiespostcodes.co.uk/towns-in-england/suffolk/",
	"Surrey" 					=> "http://www.townscountiespostcodes.co.uk/towns-in-england/surrey/",
	"Tyne and Wear" 			=> "http://www.townscountiespostcodes.co.uk/towns-in-england/tyne-and-wear/",
	"Warwickshire" 				=> "http://www.townscountiespostcodes.co.uk/towns-in-england/warwickshire/",
	"West Midlands" 			=> "http://www.townscountiespostcodes.co.uk/towns-in-england/west-midlands/",
	"West Sussex" 				=> "http://www.townscountiespostcodes.co.uk/towns-in-england/west-sussex/",
	"West Yorkshire" 			=> "http://www.townscountiespostcodes.co.uk/towns-in-england/west-yorkshire/",
	"Wiltshire" 				=> "http://www.townscountiespostcodes.co.uk/towns-in-england/wiltshire/"
);
runForAllTowns( $townArray );
?>
