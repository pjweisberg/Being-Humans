<?php

foreach (glob("cast/*.bio") as $filename) {
  process($filename);
}

function process($filename){
  preg_match('@^(?:cast/\d+-)?(.*).bio@i',
             $filename, $matches);
  echo "<a name='";
  echo $matches[1];
  echo "'/>";

  $file = fopen($filename, "r");
  echo "<h2>";
  echo fgets($file);
  echo "</h2>";
  echo "<img src='images/";
  echo fgets($file);
  echo "'/>";

  fpassthru($file);
  fclose($file);
}

?>