<?php

$first = file_get_contents("first.txt");
$second = file_get_contents("second.txt");

$assets = json_decode(file_get_contents("http://jnxt.org:7876/nxt?requestType=getAllAssets&includeCounts=true"));

$process = array();
foreach($assets->assets as $asset)
{
	$new = new STDClass();
	$new->name = $asset->name;
	$new->description = $asset->description;
	$new->id = $asset->asset;
	$new->decimals = $asset->decimals;
	$new->trades = $asset->numberOfTrades;
	array_push($process, $new);
}

$whole = $first.json_encode($process).$second;

file_put_contents("index.html", $whole);
echo "done";
?>