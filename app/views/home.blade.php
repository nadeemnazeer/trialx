<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TrialX</title>
	<style>
		
	</style>
</head>
<body>
	<div>
	<?php 
	 
	echo Entropy::calEntropy('phase');
	echo "<br>";
	echo Entropy::calEntropy('gender');
	echo "<br>";
	echo Entropy::calEntropy('treatment_status');
	echo "<br>";
	echo Entropy::calEntropy('state');
	echo "<br>";
	echo Entropy::calEntropy('city');
	


	 ?>
	</div>
</body>
</html>
