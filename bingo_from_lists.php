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
$prompts = bingo_card($prompt_lists);
$string = format_wild_card_bingo($prompts);
}

print_header($type, "Your Bingo Card");
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