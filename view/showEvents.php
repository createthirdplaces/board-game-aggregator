<?php
  require $_SERVER['DOCUMENT_ROOT'] . '/data/aggregateEvents.php';

  $data = getEvents();
  
	echo "<br><ul>";

  foreach($data as $event) {
    $eventDay = $event->nextEventDate;
		if($event->dayOfWeek){
			$eventDay = $event->dayOfWeek . "s";
		}
		echo "
		  <li>	
				<h4>{$event ->eventName}</h4>
	      {$eventDay} at {$event->nextEventTime}
		    <br> 
				{$event->eventLocation->streetAddress},
				{$event->eventLocation->city},
				{$event->eventLocation->state}
			</li>	
		";
	 }
	 echo "</ul>";
?>
