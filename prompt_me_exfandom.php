<?php

require_once('list_choices.php');
require_once('printing.php');

$listnames = get_list_list_names("ex_fandom");
$prompt_lists = choice_array("main", $listnames);
$prompt = get_a_prompt($prompt_lists);
print_header("main", "I Feel Lucky! Prompt Me");
?>
<div id="wrapper">
	<div id="welcome" class="wrapper-style1"><br>
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
