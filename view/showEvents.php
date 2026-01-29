<?php
  require $_SERVER['DOCUMENT_ROOT'] . '/data/aggregateEvents.php';
  require $_SERVER['DOCUMENT_ROOT'] . '/view/showPagination.php';


  $data = getEvents();
 
  echo showPagination($data); 
	echo "<br><ul>";

  foreach($data as $event) {
    $eventDay = ''; 
		if($event->dayOfWeek){
			$eventDay = $event->dayOfWeek . "s";
		}
	  else {
			$eventDay = $event->nextEventDate;	
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
