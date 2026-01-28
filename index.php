<html>
  <head>
    <meta charset="UTF-8" />
	  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<style>
       li {
        border-bottom: 1px solid;
			}
	    ul {
        border-top: 2px solid;
			}	
	    #container {
        padding-left:0.5rem;
				padding-right:0.5rem;
				flex: 1 0 auto;
				max-width: 65rem;
				margin-inline: auto; 
			} 
	  </style>	
	</head>
	<body>
    <div id="container"> 
			<h1>Board game event listing</h1>
      <p>This is a work in progress  proof of concept for an 
			<a href=" https://codeberg.org/createthirdplaces/board-game-aggregator">open source board game event aggregator</a>.
			 For more details, see <a href="https://createthirdplaces.org/events/decentralizedEventHosting.html">this page</a>
			 or email gulu@createthirdplaces.org</p> 
			<div id="results">
				<p>Loading</p>	
			</div>
			<?php
				require __DIR__ . '/vendor/autoload.php';


				//TODO: Check cache before calling API
				
				echo '
				<script>
					const url = "/view/showEvents.php"	
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
    </div>
  </body>
</html>
