<?php

require_once('list_choices.php');
require_once('printing.php');

$unsafelistnames = get_list_list_names("all_the_lists");
$listnames = prune_lists("safe_prune", $unsafelistnames);
$prompt_lists = choice_array("safe", $listnames);
$prompt = get_a_prompt($prompt_lists);
print_header("safe", "I Feel Lucky! Prompt Me");
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
print_footer("safe");
?>
