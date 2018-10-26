<?php

require_once('list_choices.php');
require_once('printing.php');

$listnames1 = get_list_names("general_list");
$listnames2 = get_list_names("primeval_list");
$listnames = array_merge($listnames1, $listnames2);
$prompt_lists = choice_array("primeval", $listnames);
$prompt = get_a_prompt($prompt_lists);

$charlistnames = array('primeval_chars', 'pnw_chars');
$char_prompt_lists = choice_array("primeval", $charlistnames);

$style = 'pairing';

$char_prompt = char_or_pairing($char_prompt_lists, $style);

print_header("main", "Primeval Prompt Me");
?>
<div id="wrapper">
	<div id="welcome" class="wrapper-style1">
		<div class="title">
			<p>Your Prompt Is</p><h2>
<?php
print($char_prompt); print(": "); print($prompt);
?></h2>
</div>
</div>
</div>
<?php
print_footer("main");
?>