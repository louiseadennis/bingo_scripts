<?php

require_once('parse_list.php');
$file_ext = ".txt";

function prune_lists($tobepruned, $listnames)
{
	$prunelists = get_list_names($tobepruned);
	$prunedlists = array();
	
	foreach ($listnames as $listname) {
	    if (! in_array($listname, $prunelists)) {
	       array_push($prunedlists, $listname);
	    }
	}

	return $prunedlists;
}

function get_list_list_names($filename)
{
    $path_to_file = "./$filename.txt";
    $handle = fopen($path_to_file, "r");

    $listlistnames = array();
    if ($handle) {
       while (($line = fgets($handle)) !== false) {
       	  array_push($listlistnames, rtrim($line));
       }
    } else {
      print("<p>Could not open $path_to_file</p>");
    }
    fclose($handle);

    $listnames = array();
    foreach ($listlistnames as $listfile) {
    	  $listnames = array_merge($listnames, get_list_names($listfile));
    }

    return $listnames;
}

function get_list_names($filename)
{
    $path_to_file = "./$filename.txt";
    $handle = fopen($path_to_file, "r");

    $listnames = array();
    if ($handle) {
       while (($line = fgets($handle)) !== false) {
       	  array_push($listnames, rtrim($line));
       }
    } else {
      print("<p>Could not open $path_to_file</p>");
    }
    fclose($handle);

    return $listnames;
}

function print_list_sets($type, $filename, $post_var_name)
{
    $path_to_file = "./$filename.txt";
    $handle = fopen($path_to_file, "r");

    $listlistnames = array();
    if ($handle) {
       while (($line = fgets($handle)) !== false) {
       	  array_push($listlistnames, rtrim($line));
       }
    } else {
      print("<p>Could not open $path_to_file</p>");
    }
    fclose($handle);

    foreach ($listlistnames as $listset) {
        print("<div id=\"listbox\"><p>");
	print("<h3>$listset</h3>");
	print_choices($type, $listset, $post_var_name);
	print("</p></div>");
    }
}

function list_list_sets($type, $filename)
{
    $path_to_file = "./$filename.txt";
    $handle = fopen($path_to_file, "r");

    $listlistnames = array();
    if ($handle) {
       while (($line = fgets($handle)) !== false) {
       	  array_push($listlistnames, rtrim($line));
       }
    } else {
      print("<p>Could not open $path_to_file</p>");
    }
    fclose($handle);

    foreach ($listlistnames as $listset) {
        print("<div id=\"listbox\"><p>");
	print("<h3>$listset</h3>");
	print_lists($type, $listset);
	print("</p></div>");
    }
}

function print_choices($type, $filename, $post_var_name)
{
   $listnames = get_list_names($filename);
   if ($type != "main") {
      $type_pr = $type . "_prune";
      $listnames = prune_lists($type_pr, $listnames);
   }
   foreach ($listnames as $list) {
   	   $listname = listname($list);
   	   print("<input type=checkbox name=\"$post_var_name\" value=\"$list\"><a href=\"show_list.php?list=$list&type=$type\">$listname</a><br>");
   }
}

function print_lists($type, $filename)
{
   $listnames = get_list_names($filename);
   if ($type != "main") {
      $type_pr = $type . "_prune";
      $listnames = prune_lists($type_pr, $listnames);
   }
   print("<ul>");
   foreach ($listnames as $list) {
   	   $listname = listname($list);
   	   print("<li><a href=\"show_list.php?list=$list\">$listname</a></li>");
   }
   print("</ul>");
}


function choice_array($type, $filelist)
{
	$promptlists = array();
	foreach($filelist as $file) {
		$file_info = raw_list($type, $file);
		$listname = $file_info{"listname"};
		$list = $file_info{"list"};
		$promptlists{$listname} = $list;
	}	
	return $promptlists;
}

function default_choice_number($promptlists, $prompts_needed)
{
	$num_lists = count($promptlists);
	if (($prompts_needed % $num_lists) > 0 ) {
	   return (intval($prompts_needed / $num_lists) + 1);
	} else {
	    return ($prompts_needed / $num_lists);
	}
}

function new_choice_number($num_lists, $prompts_per_list)
{
	$prompts_needed = ($num_lists + 1) * $prompts_per_list;
	if (($prompts_needed % $num_lists) > 0 ) {
	   return (intval($prompts_needed / $num_lists) + 1);
	} else {
	    return ($prompts_needed / $num_lists);
	}
}

function get_a_prompt($promptlists)
{
	$listnames = array_keys($promptlists);
	$index = array_rand($listnames);
	$listname = $listnames{$index};
	$promptlist = $promptlists{$listname};
	$prompt_index = array_rand($promptlist);
	$prompt = $promptlist{$prompt_index};
	return $prompt;
}

function char_or_pairing($promptlists, $style)
{
	$prompt = 'none';

	if (strcmp($style,'either') == 0) {
	   $coin_toss = rand(0, 1);
	   if ($coin_toss == 0) {
	      $style = 'single';
	   } else {
	      $style = 'pairing';
	   }
	}

	if (strcmp($style, 'single') == 0) {
		$prompt = get_a_prompt($promptlists);
	} else {
	       $pair = pairing($promptlists);
	       $char1 = $pair[0];
	       $prompt = "$char1 / $pair[1]";
	}


	return $prompt;
		
}

function pairing($promptlists)
{
	$listnames = array_keys($promptlists);
	$index1 = array_rand($listnames);
	$index2 = array_rand($listnames);
	$listname1 = $listnames{$index1};
	$promptlist1 = $promptlists{$listname1};
	$prompt_index1 = array_rand($promptlist1);
	$char1 = $promptlist1{$prompt_index1};
	if ($index1 == $index2) {
	    array_splice($promptlists{$listname1}, $prompt_index1, 1);
	}
	$listname2 = $listnames{$index2};
	$promptlist2 = $promptlists{$listname2};
	$prompt_index2 = array_rand($promptlist2);
	$char2 = $promptlist2{$prompt_index2};
	
	$pair = array($char1, $char2);
	return $pair;
}

function spread_array_of_prompts($promptlists, $prompts_per_list, $prompts_needed)
{
	$num_lists = count($promptlists) - 1;
	$keys = array_keys($promptlists);
	$prompts = array();
	$uses = array();
	for ($i = 0; $i < $prompts_needed; $i++) {
	    $selected_list_num = rand(0, $num_lists);
	    $selected_list_name = $keys{$selected_list_num};
	    $prompt_list = $promptlists{$selected_list_name};
	    $prompt_index = array_rand($prompt_list);
	    $prompt = $prompt_list{$prompt_index};
	    array_splice($promptlists{$selected_list_name}, $prompt_index, 1);

	    if (array_key_exists($selected_list_name, $uses)) {
	       $uses{$selected_list_name}++;
	    } else {
	       $uses{$selected_list_name} = 1;
	    }

	    if ($uses{$selected_list_name} == $prompts_per_list || count($promptlists{$selected_list_name}) == 0 ) {
	       array_splice($keys, $selected_list_num, 1);
	       $num_lists--;
	       if (count($promptlists{$selected_list_name}) == 0) {
	       	  $prompts_per_list = new_choice_number($num_lists + 1, $prompts_per_list);
	       }
	    }
	    $prompts{$i} = $prompt;
	}

	return $prompts;
}

function pairing_spread_array_of_prompts($promptlists, $char_lists, $prompts_per_list, $prompts_needed)
{
	$num_lists = count($promptlists) - 1;
	$num_char_lists = count($char_lists) - 1;
	$keys = array_keys($promptlists);
	$char_keys = array_keys($char_lists);
	$prompts = array();
	$uses = array();
	$char_uses = array();

	for ($i = 0; $i < $prompts_needed; $i++) {
	    $choice = rand(0, 1);
	    if (($choice == 0 & $num_char_lists > -1) || $num_lists < 0 ) {
	    	    $selected_list_num1 = rand(0, $num_char_lists);
	    	    $selected_list_num2 = rand(0, $num_char_lists);
	    	    $selected_list_name1 = $char_keys{$selected_list_num1};
	    	    $selected_list_name2 = $char_keys{$selected_list_num2};
                    $char_list1 = $char_lists{$selected_list_name1};
		    $char_index1 = array_rand($char_list1);
		    $char1 = $char_list1{$char_index1};
		    array_splice($char_lists{$selected_list_name1}, $char_index1, 1);
		    $char_list2 = $char_lists{$selected_list_name2};

		    if (count($char_list2) > 0) {
		    	$char_index2 = array_rand($char_list2);
		    	$char2 = $char_list2{$char_index2};
		    	array_splice($char_lists{$selected_list_name2}, $char_index2, 1);
		    	$prompt = "$char1 / $char2";
                     } else {
		        $prompts_per_list = new_choice_number($num_lists + 1, $prompts_per_list);
			$prompt = $char1;
		        array_splice($char_keys, $selected_list_num2, 1);
		        $num_char_lists--;
		     }

		    if (array_key_exists($selected_list_name1, $char_uses)) {
		           $char_uses{$selected_list_name1}++;
	            } else {
	       	      	   $char_uses{$selected_list_name1} = 1;
	  	    }

		    if ($char_uses{$selected_list_name1} == $prompts_per_list || count($char_lists{$selected_list_name1}) == 0) {
		       array_splice($char_keys, $selected_list_num1, 1);
		       $num_char_lists--;
		       if (count($char_lists{$selected_list_name1}) == 0) {
		        $prompts_per_list = new_choice_number($num_lists + 1, $prompts_per_list);
		       }
		    }

		    if (array_key_exists($selected_list_name2, $char_uses)) {
		           $char_uses{$selected_list_name2}++;
	            } else {
	       	      	   $char_uses{$selected_list_name2} = 1;
	  	    }

		    if ($char_uses{$selected_list_name2} == $prompts_per_list || count($char_lists{$selected_list_name2}) == 0) {
		       array_splice($char_keys, $selected_list_num2, 1);
		       $num_char_lists--;
		       if (count($char_lists{$selected_list_name2}) == 0) {
		        $prompts_per_list = new_choice_number($num_lists + 1, $prompts_per_list);
		       }
		    }

	    } else {
	    	    $selected_list_num1 = rand(0, $num_char_lists);
	    	    $selected_list_num = rand(0, $num_lists);
	    	    $selected_list_name = $keys{$selected_list_num};
	    	    $prompt_list = $promptlists{$selected_list_name};
	    	    $prompt_index = array_rand($prompt_list);
	    	    $prompt = $prompt_list{$prompt_index};
	    	    array_splice($promptlists{$selected_list_name}, $prompt_index, 1);

		    if (array_key_exists($selected_list_name, $uses)) {
		           $uses{$selected_list_name}++;
	            } else {
	       	      	   $uses{$selected_list_name} = 1;
	  	    }

		    if ($uses{$selected_list_name} == $prompts_per_list || count($promptlists{$selected_list_name}) == 0) {
		       array_splice($keys, $selected_list_num, 1);
		       $num_lists--;
		       if (count($promptlists{$selected_list_name}) == 0) {
		        $prompts_per_list = new_choice_number($num_lists + 1, $prompts_per_list);
		       }
		    }
	    }
	    $prompts{$i} = $prompt;
	}

	return $prompts;
}

function array_of_prompts($promptlists, $prompts_needed)
{
	$num_lists = count($promptlists) - 1;
	$keys = array_keys($promptlists);
	$prompts = array();
	for ($i = 0; $i < $prompts_needed; $i++) {
	    $selected_list_num = rand(0, $num_lists);
	    $selected_list_name = $keys{$selected_list_num};
	    $prompt = array_rand($promptlists{$selected_list_name});
	    $prompts{$i} = $prompt;
	}

	return $prompts;
}

function bingo_card($promptlists)
{
	$choice_num = default_choice_number($promptlists, 24);
	$prompts = spread_array_of_prompts($promptlists, $choice_num, 24);
	return $prompts;
}

function pairing_bingo_card($promptlists, $charlists)
{
	$choice_num1 = default_choice_number($promptlists, 12);
	$choice_num2 = default_choice_number($charlists, 24);
	$choice_num = max($choice_num1, $choice_num2);
	$prompts = pairing_spread_array_of_prompts($promptlists, $charlists, $choice_num, 24);
	return $prompts;
}

function format_wild_card_bingo($prompts)
{
	$string = "<table height=\"500\" cellspacing=10 border><tr height=20% align=center>";
	for ($i = 0; $i < 5; $i++) {
	    $element = $prompts{$i};
	    $string = $string."<td width=20%>"; $string = $string.$element; $string = $string."</td>";
        }
	$string = $string."</tr><tr height=20% align=center>";
	for ($i = 5; $i < 10; $i++) {
	    $element = $prompts{$i};
	    $string = $string."<td width=20%>"; $string = $string.$element; $string = $string."</td>";
        }
	$string = $string."</tr><tr height=20% align=center>";
	for ($i = 10; $i < 12; $i++) {
	    $element = $prompts{$i};
	    $string = $string."<td width=20%>"; $string = $string.$element; $string = $string."</td>";
        }
	$string = $string."<td width=20%>Wild Card</td>";
	for ($i = 12; $i < 14; $i++) {
	    $element = $prompts{$i};
	    $string = $string."<td width=20%>"; $string = $string.$element; $string = $string."</td>";
        }
	$string = $string."</tr><tr height=20% align=center>";
	for ($i = 14; $i < 19; $i++) {
	    $element = $prompts{$i};
	    $string = $string."<td width=20%>"; $string = $string.$element; $string = $string."</td>";
        }
	$string = $string."</tr><tr height=20% align=center>";
	for ($i = 19; $i < 24; $i++) {
	    $element = $prompts{$i};
	    $string = $string."<td width=20%>"; $string = $string.$element; $string = $string."</td>";
        }
	$string = $string."</tr><tr height=20% align=center></table>";
	return $string;
}

function format_html_string_for_pasting($string)
{
   $nonhtmlstring = str_replace("<", "&lt;", $string);
   $string = str_replace(">", "&gt;", $nonhtmlstring);
   return $string;
}

?>