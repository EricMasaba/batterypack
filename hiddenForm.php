<?php

		$fields = [
		"unid",
		"customer_unid",
		"departureDate",
		"departureTime",
		"origin",
		"destination",
		"vehicleType",
		"seats",
		"children",
		"luggage",
		"message"
		];

		$i=1;

		$format = [
		"<input id=\"hf%02d\" type=\"hidden\" name=\"%s\" value=\"\">\n",

		"
<label for=\"hf%1\$02d\">
  <span>%2\$s:</span>
  <input id=\"hf%1\$02d\" type=\"text\" name=\"%2\$s\" value=\"\" />
</label>\n
		",

		"<div>
			<label for=\"hf%1\$02d\">%2\$s</label>
			<input id=\"hf%1\$02d\" type=\"hidden\" name=\"%2\$s\" value=\"\">\r
</div>\n",

		"<div>
		<span style=\"white-space:nowrap\">
		    <label for=\"hf%1\$02d\">%2\$s:</label>
		    <input type=\"text\" id=\"hf%1\$02d\" name=\"%2\$s\" />\r
		</span>
</div>\n",

		"<div>
			<label for=\"hf%1\$02d\">%2\$s</label>
			<input id=\"hf%1\$02d\" type=\"text\" name=\"%2\$s\" value=\"\">\r
</div>\n",

		"
<label class=\"icon\" for=\"hf%1\$02d\"><i class=\"icon-envelope \"></i></label>
<input type=\"text\" name=\"%2\$s\" id=\"hf%1\$02d\"  placeholder=\"%2\$s\" required/>
		"
		];

		$r = (isset($_GET['r']) && !empty($_GET['r'])) ? min(count($format)-1, intval($_GET['r'])) : 2;
		$r = min(count($format)-1, isset($debug)?$debug:0);
/*
		echo "<div id=\"fields\">\n\n";
         foreach( $fields as $value ) {
            echo sprintf($format[$r],$i++,$value);
         }
        echo "</div>";

	*/	
        echo "<form id=\"goob\">\n\n";
         foreach( $fields as $value ) {
            echo sprintf($format[$r],$i++,$value);
         }
        echo "</form>";

/*
		$r = 03;
		if (isset($_GET['r']) && !empty($_GET['r'])) {
			$r = min(count($format)-1, intval($_GET['r']));
		}

*/

?>
