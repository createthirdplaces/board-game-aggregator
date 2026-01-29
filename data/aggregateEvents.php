<?php

require "api.php";

/* Hardcoded events that will be used for testing
purposes*/
function getTestEvents() {
  $data = file_get_contents(__DIR__ . '/testEvents.json');
  $events = json_decode($data);
  
	return $events -> eventData;

}

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
		
  $events = array_merge($events,getTestEvents());
	return $events;

}
?>
