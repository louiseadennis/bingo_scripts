<?php

require_once('list_choices.php');
require_once('printing.php');

$unsafelistnames = get_list_names("general_list");
$listnames = prune_lists("safe", $unsafelistnames);
$prompt_lists = choice_array("safe", $listnames);
$prompt = get_a_prompt($prompt_lists);
print_header_safe("safe", "I Feel Lucky! Prompt Me");
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
