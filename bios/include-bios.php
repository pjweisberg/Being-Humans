<?php

$bio_template = file_get_contents("bios/template.html");

foreach (glob("bios/*.bio") as $filename) {
  process($filename, $bio_template);
}

function process($filename, $template){
  preg_match('@^(?:bios/\d+-)?(.*).bio@i',
             $filename, $matches);
  $identifier = $matches[1];

  $file = fopen($filename, "r");
  $cast_name = trim(fgets($file));
  $cast_photo = trim(fgets($file));
  $text = fread($file, 8192);

  $placeholders = array( "@@id@@",    "@@name@@", "@@photo@@", "@@text@@" );
  $replacements = array( $identifier, $cast_name, $cast_photo, $text );

  echo str_replace( $placeholders, $replacements, $template );
}

?>