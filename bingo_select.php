<?php

require_once('list_choices.php');
require_once('printing.php');

print_header("main", "Selects lists for a Bingo Card");
?>
<div id="wrapper">
	<div class="wrapper-style1">
		<div class="title">
			<h2>Select the Lists</h2>
</div>
<form method="post" action="bingo_from_lists.php">
		<?php
		print_list_sets("main", "all_the_lists", "promptlist[]");
		?>

	<div id="submit"><p align=center><input type="submit" name="submit" value="Submit"/></p></div>
	     </form>
</div>
</div>

<?php
print_footer("main");
?>
