<?php

	$count = intval(file_get_contents('counter.txt'));
	file_put_contents('counter.txt', ++$count);
	echo file_get_contents('counter.txt');
?>