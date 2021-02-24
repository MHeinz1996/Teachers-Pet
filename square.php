<?php
class square extends rectangle {
	function __construct($intSize, $strGraphic){
		parent::__construct($intSize, $intSize, $strGraphic);
	}
	function resize($intSize) {
		parent::resize($intSize, $intSize);
    	}
}
?>
