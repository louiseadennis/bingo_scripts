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
$prompt = get_a_prompt($prompt_lists);
print_header($type, "Pick a List: Prompt Me");
}
?>
<div id="wrapper">
	<div id="welcome" class="wrapper-style1">
		<div class="title">
			<p>Your Prompt Is</p><h2>
<?php
print($prompt);
?></h2>
</div>
</div>
</div>
<?php
print_footer($type);
?>
