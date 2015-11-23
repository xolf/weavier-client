#!/bin/php
<?php

$a = $argv;

$g = $_GET;

$version = '0.0.1';

$curl = curl_init();

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($curl, CURLOPT_USERAGENT, 'weavier-client v' . $version);

if($g['action'] == 'setup')
{
    
    echo '<a href="?action=setup"></a>';
    
}
