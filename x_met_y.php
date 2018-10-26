<?php

require_once('list_choices.php');
require_once('printing.php');

if (isset($_POST['type'])) {
   $type = $_POST['type'];
} else {
   $type = "main";
}

if (isset($_POST['submit'])) {

$charlistnames = $_POST['charlist'];
$char_prompt_lists = choice_array($type, $charlistnames);
}

print_header($type, "X met Y at Z");
$listnames = array('places');
$prompt_lists = choice_array($type, $listnames);
$prompt = get_a_prompt($prompt_lists);
$pair = pairing($char_prompt_lists);
?>
<div id="wrapper">
	<div class="wrapper-style1">
		<div class="title">
			<p>Your Prompt Is</p><h2>
<?php
print($pair[0]);
?>
 met 
<?php
print($pair[1]);
?> <?php print($prompt);?>
</h2>
</div>
</div>
</div>
<?php
print_footer($type);
?>
</div>
