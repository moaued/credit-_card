<?php
$test_HTTP_proxy_headers = array(
	'HTTP_VIA',
	'VIA',
    
	'Proxy-Connection',
	'HTTP_X_FORWARDED_FOR',  
	'HTTP_FORWARDED_FOR',
	'HTTP_X_FORWARDED',
	'HTTP_FORWARDED',
	'HTTP_CLIENT_IP',
	'HTTP_FORWARDED_FOR_IP',
	'X-PROXY-ID',
	'MT-PROXY-ID',
	'X-TINYPROXY',
	'X_FORWARDED_FOR',
	'FORWARDED_FOR',
	'X_FORWARDED',
	'FORWARDED',
	'CLIENT-IP',
	'CLIENT_IP',
	'PROXY-AGENT',
	'HTTP_X_CLUSTER_CLIENT_IP',
	'FORWARDED_FOR_IP',
	'HTTP_PROXY_CONNECTION');
	
	foreach($test_HTTP_proxy_headers as $header){
		if (isset($_SERVER[$header]) && !empty($_SERVER[$header])) {
			exit("Please disable your proxy connection!");
		}
	}

    $proxy_ports = array(80,81,8080,443,1080,6588,3128,127);
	foreach($proxy_ports as $test_port) {
		if(@fsockopen($_SERVER['REMOTE_ADDR'], $test_port, $errno, $errstr, 5)) {
			exit("Please disable your proxy connection!");
		}
	}
$ip_blacklist = array('192.168.1.1', '1.1.1.1', '5.5.5.5','127.1.1.0');
	if(isset($_SERVER['REMOTE_ADDR']) && is_array($ip_blacklist)) {
		if(in_array($_SERVER['REMOTE_ADDR'], $ip_blacklist)) {
			exit("Please disable your proxy connection!");
		}
	}
    ?>