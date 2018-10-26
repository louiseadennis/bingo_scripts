<?php

require_once('list_choices.php');
require_once('printing.php');

if (isset($_POST['type'])) {
   $type = $_POST['type'];
} else {
   $type = "main";
}

if (isset($_POST['submit'])) {

$listnames = $_POST['promptlist'];
$prompt_lists = choice_array($type, $listnames);

$charlistnames = $_POST['charlist'];
$char_prompt_lists = choice_array($type, $charlistnames);

$style = $_POST['char_style'];

if (strcmp($style,'single') == 0) {
   $combined_lists = array_merge($prompt_lists, $char_prompt_lists);
   $prompts = bingo_card($combined_lists);
   $string = format_wild_card_bingo($prompts);
} else if (strcmp($style,'pairing') == 0) {
   $prompts = pairing_bingo_card($prompt_lists, $char_prompt_lists);
   $string = format_wild_card_bingo($prompts);
} else {
   $combined_lists = array_merge($prompt_lists, $char_prompt_lists);
   $prompts = pairing_bingo_card($combined_lists, $char_prompt_lists);
   $string = format_wild_card_bingo($prompts);
}
}

print_header($type, "Your Mixed Characters and Prompts Bingo Card");
?>
<div id="wrapper">
	<div id="welcome" class="wrapper-style1">
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
?></p>
</div>
</div>

<?php
print_footer($type);
?>