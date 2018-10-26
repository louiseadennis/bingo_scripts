<?php
require_once('list_choices.php');

?>
<html>
<body>
<?php
$listnames = get_list_names("general_list");
$prompt_lists = choice_array($listnames);
$prompt = get_a_prompt($prompt_lists);
print ($prompt);
?>
</body>
</html>