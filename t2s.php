<?php
	$content = "";
	if (isset($_GET['s'])) {
		$content = $_GET['s'];
	} else if (isset($_POST['s'])) {
		$content = $_POST['s'];
	} 

	if ($content == "") {
		echo 'input $s';
		exit(1);
	}
	$fn = '/tmp/macsays.bak';
	$fp = fopen($fn, 'w');
	fwrite($fp, $content);
	fclose($fp);

	$cmd = "say -f $fn";
	shell_exec($cmd);
?>
<script>window.close()</script>