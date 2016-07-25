<?php

	$inputFile  = "$plugin_url/assets/sly-plugin.less";
	$outputFile = "$plugin_url/assets/sly-plugin.css";

/**
 * Auto Compiling LESS files (cache)
 * @param  string $inputFile  path to the less (input) file
 * @param  string $outputFile path to the css (output) file
 */
$less = new lessc;

// create a new cache object, and compile
$cache = $less->cachedCompile($inputFile);

file_put_contents($outputFile, $cache["compiled"]);

// the next time we run, write only if it has updated
$last_updated = $cache["updated"];
$cache = $less->cachedCompile($cache);
if ($cache["updated"] > $last_updated) {
    file_put_contents($outputFile, $cache["compiled"]);
}
?>