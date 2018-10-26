<?php

require_once('list_choices.php');
require_once('printing.php');

$listnames = get_list_names("general_list");
$prompt_lists = choice_array("main", $listnames);
$prompts = bingo_card($prompt_lists);
$string = format_wild_card_bingo($prompts);
print_header("main", "I Feel Luck! Bingo Card");
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
print_footer("main");
?>
