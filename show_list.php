<?php

require_once('parse_list.php');
require_once('printing.php');

$filename = $_GET["list"];
if (isset($_GET["type"])) {
   $type = $_GET["type"];
} else {
   $type = "main";
}

print_header($type, "Show List $filename");
?>
<div id="wrapper">
	<div id="welcome" class="wrapper-style1"><br>
<?php

print_list($type, $filename);
?>
</div>
</dv
print_footer($type);
?>
