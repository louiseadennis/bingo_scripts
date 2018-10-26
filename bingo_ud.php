<?php

require_once('list_choices.php');
require_once('printing.php');

$listnames1 = get_list_names("general_list");
$listnames2 = get_list_names("urbandead_list");
$listnames = array_merge($listnames1, $listnames2);
$prompt_lists = choice_array("main", $listnames);
$prompts = bingo_card($prompt_lists);
$string = format_wild_card_bingo($prompts);

print_header("main", "Your Urban Dead Bingo Card");
?>
<div id="wrapper">
	<div id="welcome" class="wrapper-style1">
		<div class="title">
			<h2>Your Urban Dead Bingo Card</h2>
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
print_footer("main");
?>