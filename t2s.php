<?php
	function to_utf8($str){
		return mb_convert_encoding($str,"UTF-8", "BIG5");
	}
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
	$content = to_utf8($content);
	fwrite($fp, $content);
	fclose($fp);

	$cmd = "say -f $fn";
	echo "<!-- $cmd -->";
	shell_exec($cmd);
?>
<script>window.close()</script>