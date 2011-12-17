<?php
	#$content = 'hello "Mike Chen"';
	if (isset($_GET['s']) && '' != $_GET['s']) {
		$content = $_GET['s'];
	} else if (isset($_POST['s']) && '' != $_POST['s']) {
		$content = $_POST['s'];
	} else {
		echo 'input $s';
		exit(1);
	}
	$content = str_replace('"', '\"', $content);
	$cmd = 'say "'.$content.'"';
	shell_exec($cmd);
//<script>window.close()</script>
?>