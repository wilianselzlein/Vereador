<?php
	//$this->response->type('application/pdf');
	//echo $this->fetch('content');
	header("Content-type: application/pdf");
	$this->response->type('application/pdf');
	echo $content_for_layout;
?>