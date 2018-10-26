<?php

require_once('list_choices.php');
require_once('printing.php');

print_header("main", "Selects lists for an Urban Dead Bingo Prompt");
?>
<div id="wrapper">
	<div class="wrapper-style1">
		<div class="title">
			<h2>Select the Lists</h2>
</div>
<form method="post" action="bingo_from_lists.php">
<h3>Prompt Lists</h3>
<p>
<?php
print_choices("main", "general_list", "promptlist[]");
print_choices("main", "urbandead_list", "promptlist[]");
?></p>
</p>

<p align=center><input type="submit" name="submit" value="Submit"/></p>
</form>
</div>
</div>

<?php
print_footer("main");
?>
