<?php

require "api.php";

//TODO: Include parameters
function getEvents() { 
	$endpoint = "searchEvents";

	$aggregators = getAggregators();

	$events = [];
	foreach ($aggregators as $aggregator){
		$response = callApi($aggregator . "/searchEvents");
		$data = json_decode($response);
		$eventData = $data -> eventData;
		$events = array_merge($events, $eventData);
	}
	return $events;

}
?>
