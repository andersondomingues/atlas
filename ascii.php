<?php
	$noc_w = 9;
	$noc_h = 9;

	for($i = 0; $i < $noc_w; $i++)
	for($j = 0; $j < $noc_h; $j++)
	for($n = 0; $n <= 4; $n++)
	{
		$router_name = "r" . $i . $j . "p" . "$n";

		if(file_exists($router_name .".txt"))
			if(filesize($router_name. ".txt") > 1)
				echo $router_name . "\n";
	}
?>
