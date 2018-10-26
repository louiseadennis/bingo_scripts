<?php
require_once('list_choices.php');

?>
<html>
<head>
</head>
<body>

<?php
	$promptlist = $_POST['promptlist'];
	foreach ($promptlist as $prompt) {
		print ("$prompt<br>");
	}

	$lists = choice_array($promptlist);
	$number = default_choice_number($lists, 21);
	print("Hello $number<br>");
?>
</body>
</html>