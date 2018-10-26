<?php

require_once('list_choices.php');
require_once('printing.php');

$listnames1 = get_list_names("general_list");
$listnames2 = get_list_names("urbandead_list");
$listnames = array_merge($listnames1, $listnames2);
$prompt_lists = choice_array("main", $listnames);
$prompt = get_a_prompt($prompt_lists);

print_header("main", "Urban Dead Prompt Me");
?>
<div id="wrapper">
	<div id="welcome" class="wrapper-style1">
		<div class="title">
			<p>Your Prompt Is</p><h2>
<?php
print($prompt);
?></h2>
</div>
</div>
</div>
<?php
print_footer("main");
?>