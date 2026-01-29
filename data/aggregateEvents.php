<?php

require "api.php";

/* Hardcoded events that will be used for testing
purposes*/
function getTestEvents() {
  $data = file_get_contents(__DIR__ . '/testEvents.json');
  $events = json_decode($data);
  
	return $events -> eventData;

}

function cmp($a, $b){

  if(!isset($a->nextEventDate)){
    $a->nextEventDate = date(
      'Y-m-d',
		  strtotime('next ' . $a->dayOfWeek)
		);
	}
 
  if(!isset($b->nextEventDate)||strlen($b->nextEventDate)===0){
	  $b->nextEventDate = date(
      'Y-m-d',
		  strtotime('next ' . $b->dayOfWeek)
		);

	}

  if($a->nextEventDate > $b->nextEventDate){
		return 1;
	}
	if($a->nextEventDate < $b->nextEventDate){
		return -1;
	}

  if($a->nextEventTime > $b->nextEventTime){
		return 1;
	}
	return -1;
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
/ 
 $events = array_merge($events,getTestEvents());
	
 /*
  TODO:Optimize sorting of events by next event time.
	Merging multiple arrays that are already sorted by time
	can be done by only looping through each array only once.
 */
	usort($events, "cmp");
  return $events;

}
?>
