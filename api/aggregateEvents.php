<?php

require "api.php";

$endpoint = "searchEvents";

$aggregators = getAggregators();

foreach ($aggregators as $aggregator){
  $response = callApi($aggregator . "/searchEvents");
  echo $response;
}


?>
