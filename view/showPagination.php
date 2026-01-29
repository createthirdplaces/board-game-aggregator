<?php

define("PAGE_SIZE", 10);

function showPagination($data){
	
	$results = count($data);
  
	$page = 0;
	if (isset($_GET['page'])){
    $page = $_GET['page'];
  }

  $start = $page * PAGE_SIZE + 1;
	$end =  min($results, $start + PAGE_SIZE - 1);
  $maxPage = floor($results/PAGE_SIZE);	


	echo "
    Showing {$start} to {$end} out
		of {$results}
	";
  
   $url = "index.html";	
   
   if($page > 0){
	   $prevQuery = $_GET;
	   $prevQuery['page'] = $page - 1;	
	   $prevQuery = http_build_query($prevQuery);	
	   $prevUrl = $url . "?" . $prevQuery; 
	   echo "<a href='{$prevUrl}'>Previous</a>";	 
  }
 
  echo "&nbsp";
	
	if($page < $maxPage){
	  $nextQuery = $_GET;
	  $nextQuery['page'] = $page + 1;	
	  $nextQuery = http_build_query($nextQuery);	
	  $nextUrl = $url . "?" . $nextQuery; 
	  echo "<a href='{$nextUrl}'>Next</a>";
	}


}





?>
