<?php

/*
 * Get a p2p content item
 * @param $item slug of the content item
 * @return $json json of content item
 */

function getContentItem($item){

	//p2p api key 
	$P2Paccesstoken = 'xxx';

	// p2p url
	$P2Purl = "http://content-api.p2p.tribuneinteractive.com/content_items/" . $item . ".json";

	// initialize curl
	$curl = curl_init();

	// curl header
	$headr = array();
	$headr[] = 'Authorization: Bearer '. $P2Paccesstoken;

	// set curl options

	curl_setopt($curl, CURLOPT_URL, $P2Purl);
	curl_setopt($curl, CURLOPT_HTTPHEADER,$headr);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

	// get the json from p2p
	$json = curl_exec($curl);

	// close the curl connection
	curl_close($curl);
	
	// convert json to array
	return json_decode($json);
}
