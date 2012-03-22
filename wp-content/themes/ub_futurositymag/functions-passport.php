<?php
	function bp_dump() {
		global $bp;
	 
		foreach ( (array)$bp as $key => $value ) {
			echo '&lt;pre&gt;';
			echo '&lt;strong&gt;' . $key . ': &lt;/strong&gt;&lt;br /&gt;';
			print_r( $value );
			echo '&lt;/pre&gt;';
		}
	}