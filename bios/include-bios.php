<?php

$bio_template = file_get_contents("bios/template.html");

foreach (glob("bios/*.bio") as $filename) {
  switch_photo_side();
  process($filename, $bio_template);
}

function switch_photo_side(){
  global $photo_side;
  if( $photo_side == "right" ){
    $photo_side = "left";
  }else{
    $photo_side = "right";
  }
}

function process($filename, $template){
  global $photo_side;
  preg_match('@^(?:bios/\d+-)?(.*).bio@i',
             $filename, $matches);
  $identifier = $matches[1];

  $file = fopen($filename, "r");
  $cast_name = trim(fgets($file));
  $cast_photo = trim(fgets($file));
  $text = fread($file, 8192);

  $placeholders = array( "@@id@@",    "@@name@@", "@@photo@@", "@@text@@", "@@photo-side@@" );
  $replacements = array( $identifier, $cast_name, $cast_photo, $text, $photo_side );

  echo str_replace( $placeholders, $replacements, $template );
}

?>