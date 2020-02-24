<?php  

	function Readrss ($url) {
		$data = json_decode(json_encode(simplexml_load_string(file_get_contents($url),null,LIBXML_NOCDATA)),true);
		return $data;
	}