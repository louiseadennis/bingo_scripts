<?php

require_once('list_choices.php');
require_once('printing.php');

print_header("main", "Select Characters for an X met Y Prompt");
?>
<div id="wrapper">
	<div class="wrapper-style1">
		<div class="title">
			<h2>Select the Lists</h2>
</div>
<form method="post" action="x_met_y.php">
<h3>Character Lists</h3>
<p><?php
print_list_sets("main", "char_lists", "charlist[]");
?></p>

<div id="submit">
<p align=center><input type="submit" name="submit" value="Submit"/></p>
</div>
</form>
</div>
</div>

<?php
print_footer("main");
?>
