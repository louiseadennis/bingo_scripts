<?php

$file_ext = ".txt";

function print_list($type, $filename)
{
	$list_info = raw_list($type, $filename);
	$listname = $list_info{"listname"};
	$prompts = $list_info{"list"};
	print("<h3>$listname</h3><ol>");
	foreach ($prompts as $prompt) {
		print("<li>$prompt</li>\n");
	}
	print "</ol>";
}

function listname($filename)
{
    $path_to_file = "./prompt_lists/$filename.txt";
    $handle = fopen($path_to_file, "r");

    $gottitle = False;
    if ($handle) {
       $line = fgets($handle);
       $listname = $line;
    } else {
      print("<p>Could not open $path_to_file</p>");
    }
    fclose($handle);

    return $listname;
    
}

function raw_list($type, $filename)
{
    $path_to_file = "./prompt_lists/$filename.txt";
    $handle = fopen($path_to_file, "r");

    $raw_list = array();
    $gottitle = False;
    if ($handle) {
       while (($line = fgets($handle)) !== false) {
          if ($gottitle == False) {
       	     $listname = $line;
	     $gottitle = True;
          } else {
             $pattern = '/(\d*. )(.*)/';
	     $mod_pattern = '/--- (.*)/';
  	     $prompt_no_mod = preg_replace($pattern, '$2', $line);
	     $valid_prompt = True;
	     if (preg_match($mod_pattern, $prompt_no_mod, $match)) {
	        $special_case = $match[0];
		$exclude_pattern = '/exc: (.*)/';
		if (preg_match($exclude_pattern, $special_case, $match)) {
		   $type_pattern = "/$type/";
		   if (preg_match($type_pattern, $match[1])) {
		      $valid_prompt = False;
		   }
		}
	        $prompt = preg_replace($mod_pattern, '', $prompt_no_mod);
	     } else {
	       $prompt = $prompt_no_mod;
	     }
	     $mod_pattern2 = '/(.*)=== types: (.*)/';
	     $final_prompt = preg_replace($mod_pattern2, '$1', $prompt);
	     if ($valid_prompt == True) {
	        array_push($raw_list, $final_prompt);
	     }
          }
       }
    } else {
      print("<p>Could not open $path_to_file</p>");
    }

    $list_info = array( "listname" => $listname,
    		"list" => $raw_list,
    );
    fclose($handle);

    return $list_info;
    
}
?>