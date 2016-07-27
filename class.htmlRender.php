<?php

	require_once("__appconfig.php");

	function fa($icon, $id=NULL,$size=1){
		$id = ($id!=NULL || $id!="") ? sprintf("id=\"%s\"",$id) : "";
		$a = sprintf("<i %2\$s class=\"fa fa-%3\$dx fa-%1\$s\" aria-hidden=\"true\"></i>",$icon,$id,$size);
		return ($a);
	}

	function fontAwe($icon, $id=NULL,$size=1){
		$id = ($id!=NULL || $id!="") ? sprintf("id=\"%s\"",$id) : "";
		$a = sprintf("<i %2\$s class=\"fa fa-%3\$dx fa-%1\$s\" aria-hidden=\"true\"></i>",$icon,$id,$size);
		return ($a);
	}

	function headerRow($list="arbitrary"){
		$multiplier = count($list);
		$a = "<TR colspan=\"".$multiplier."\">".str_repeat("<TH>%s</TH>", $multiplier)."</TR>";
		return ($a);
	}

	function bodyRow($list="arbitrary"){
		$multiplier = count($list);
		$a = "<TR>".str_repeat("<TD>%s</TD>", $multiplier)."</TR>";
		return ($a);
	}

	function addScripts($scriptlist="js/noscripts.js"){
		$scriptAddformat = "<script src=\"%s\"></script>\n";
		
		foreach ($scriptlist as $key => $value) {
			echo sprintf($scriptAddformat,$value);
		}

	}

?>
