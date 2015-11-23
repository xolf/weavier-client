<?php
#!/bin/php

$a = $argv;

$g = $_GET;

$p = $_POST;

$version = '0.0.1';

$curl = curl_init();



curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($curl, CURLOPT_USERAGENT, 'weavier-client v' . $version);

//Web interface
if($g['action'] == 'setup')
{
    
?>
	<h1>Weavier</h1>
	<form method="post" action="?action=setup-create">
		<input type="url" name="server" placeholder="Custom server address">
		<p>Leave it blank if you want to use the standart weavier server</p>
		<input type="submit" value="Setup">
	</form>
<?php    
    
}

if($g['action'] == 'setup-create')
{

	$client_url = $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'];
	
	curl_setopt($curl, CURLOPT_URL, '');
	
	$server_url = 'http://localhost/server/';
	
	if($p['server'] != "") $server_url = $p['server'];
	
	$add_url = $server_url . '?add-client=' . $client_url;
	
	curl_setopt($curl, CURLOPT_URL, $add_url);
	
	echo $add_url;
	
	//echo curl_exec($curl);
	
	echo curl_error($curl);

}
