<?php

require_once('list_choices.php');
require_once('printing.php');

print_header("main", "Selects lists  and Characters for a Single Prompt");
?>
<div id="wrapper">
	<div class="wrapper-style1">
		<div class="title">
			<h2>Select the Lists</h2>
</div>
<form method="post" action="prompt_me_chars.php">
<h3>Character Lists</h3>
<p><?php
print_choices("main", "char_list", "charlist[]");
?></p>
<h3>Prompt Lists</h3>
<?php
print_list_sets("main", "all_the_lists", "promptlist[]");
?>;

<div id="submit">
<p><input type="radio" name="char_style" value="single">I want a character and a prompt<br>
<input checked type="radio" name="char_style" value="pairing">I want a pairing and a prompt</br>
<input type="radio" name="char_style" value="either">I want either a character or a pairing and a prompt
</p>

<p align=center><input type="submit" name="submit" value="Submit"/></p>
</div>
</form>
</div>
</div>

<?php
print_footer("main");
?>
