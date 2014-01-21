<?php

// Make sure we are called from index.php
if (!defined('SECURITY')) die('Hacking attempt');

// Check if the API is activated
$api->isActive();

// Check user token
$user_id = $api->checkAccess($user->checkApiKey($_REQUEST['api_key']), @$_REQUEST['id']);

// Output JSON format
$data = array(
	// coin info
	'currency' 				=> $config[currency],
	'coinname'				=> $config[gettingstarted][coinname],
	// coin algorithm info
	'cointarget' 			=> $config[cointarget],
	'coindiffchangetarget' 	=> $config[coindiffchangetarget],
	'algorithm' 			=> $config[algorithm],
	// stratum
	'stratumport'			=> $config[gettingstarted][stratumport],
	// payments
	'payout_system' 		=> $config[payout_system],
	'min_ap_threshold' 		=> $config[ap_threshold][min],
	'max_ap_threshold' 		=> $config[ap_threshold][max],
	'txfee' 				=> $config[txfee],
	'fees'					=> $config[fees],
);

echo $api->get_json($data);

// Supress master template
$supress_master = 1;
?>
