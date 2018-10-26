<?php

require_once('list_choices.php');
require_once('printing.php');

$unsafelistnames = get_list_list_names("all_the_lists");
$listnames = prune_lists("safe_prune", $unsafelistnames);
$prompt_lists = choice_array("safe", $listnames);
$prompts = bingo_card($prompt_lists);
$string = format_wild_card_bingo($prompts);
print_header("safe", "I Feel Luck! Bingo Card");
?>
<div id="wrapper">
	<div id="welcome" class="wrapper-style1"><br>
		<div class="title">
			<h2>Your Bingo Card</h2>
		</div>
<p align=center>
<?php
print($string);
?></p>

<p>And for repasting as HTML:</p>
<p><?php
print(format_html_string_for_pasting($string));
?></p><br>
</div>
</div>
<?php
print_footer("safe");
?>
