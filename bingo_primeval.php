<?php

require_once('list_choices.php');
require_once('printing.php');

$listnames1 = get_list_names("general_list");
$listnames2 = get_list_names("primeval_list");
$listnames = array_merge($listnames1, $listnames2);
$prompt_lists = choice_array("primeval", $listnames);
$prompts = bingo_card($prompt_lists);
$string = format_wild_card_bingo($prompts);

$charlistnames = array('primeval_chars', 'pnw_chars');
$char_prompt_lists = choice_array("primeval", $charlistnames);

$style = 'pairing';

$char_prompt = char_or_pairing($char_prompt_lists, $style);

print_header("main", "Your Primeval Bingo Card");
?>
<div id="wrapper">
	<div id="welcome" class="wrapper-style1">
		<div class="title">
			<h2>Your Primeval Bingo Card</h2>
</div>
<p align=center>
<?php
print($char_prompt);
print("<br>");
print($string);
?></p>

<p>And for repasting as HTML:</p>
<p><?php
print(format_html_string_for_pasting($string));
?></p>
</div>
</div>

<?php
print_footer("main");
?>