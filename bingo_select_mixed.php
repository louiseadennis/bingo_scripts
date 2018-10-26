<?php

require_once('list_choices.php');
require_once('printing.php');

print_header("main", "Selects lists and Characters for a Bingo Card");
?>
<div id="wrapper">
	<div class="wrapper-style1">
		<div class="title">
			<h2>Select the Lists</h2>
</div>
<form method="post" action="bingo_mixed.php">
<h3>Character Lists</h3>
<p><?php
print_choices("main", "char_list", "charlist[]");
?></p>
<h3>Prompt Lists</h3>

<?php
print_list_sets("main", "all_the_lists", "promptlist[]");
?>

<div id="submit">
<p><input type="radio" name="char_style" value="single">I want just single character prompts<br>
<input checked type="radio" name="char_style" value="pairing">I want just pairing prompts</br>
<input type="radio" name="char_style" value="both">I want both single character and pairing prompts
</p>

<p align=center><input type="submit" name="submit" value="Submit"/></p>
</div>
</form>
</div>
</div>

<?php
print_footer("main");
?>
