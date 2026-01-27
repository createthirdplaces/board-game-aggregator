<html>
  <head>
	</head>
	<body>
  
		<h1>Board game aggregator</h1>
		<div id="results">
	    <p>Loading</p>	
		</div>
		<?php
			require __DIR__ . '/vendor/autoload.php';


      //TODO: Check cache before calling API
      
			echo '
      <script>
		    const url = "/api/aggregate.php"	
				const data = fetch(url,{
           "Content-Type": "text/html; charset=UTF-8"
					}).then((response)=>{
						if (!response.ok){
							throw new Error(`Response status: ${response.status}`);
						}
					  console.log(response);	
						response.text().then((result)=>{
							document.getElementById(`results`).innerHTML = result;
						});

				});
			</script>';
    ?>

  </body>
</html>
