<?php

require_once('list_choices.php');
require_once('printing.php');

if (isset($_POST['type'])) {
   $type = $_POST['type'];
} else {
   $type = "main";
}

print_header($type, "List Categories");

?>
<div id="wrapper">
	<div class="wrapper-style1">
		<div class="title">
			<h2>All the Lists</h2>
</div>
<?php
list_list_sets($type, "all_the_lists");
?>
<div id="listbox">
<h3>Character Lists</h3>
<p><?php
print_lists($type, "char_list");
?></p></div>
<div id="submit"></div>
</div>
</div>

<?php
print_footer($type);
?>