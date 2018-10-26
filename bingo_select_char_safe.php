<?php

require_once('list_choices.php');
require_once('printing.php');

print_header("safe", "Selects lists and Characters for a Bingo Prompt");
?>
<div id="wrapper">
	<div class="wrapper-style1">
		<div class="title">
			<h2>Select the Lists</h2>
</div>
<form method="post" action="bingo_chars.php">
<h3>Character Lists</h3>
<p><?php
print_choices("safe", "char_list", "charlist[]");
?></p>
<h3>Prompt Lists</h3>
<?php
print_list_sets("safe", "all_the_lists", "promptlist[]");
?>

<div id="submit">
<p><input type="radio" name="char_style" value="single">I want a character and a prompt<br>
<input checked type="radio" name="char_style" value="pairing">I want a pairing and a prompt</br>
<input type="radio" name="char_style" value="either">I want either a character or a pairing and a prompt
</p>
</div>

	<input type=hidden name="type" value="safe">
<p align=center><input type="submit" name="submit" value="Submit"/></p>
</form>
</div>
</div>

<?php
print_footer("safe");
?>
