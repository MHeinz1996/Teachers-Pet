<?php
class shape {
	private $intHeight;
	private $intWidth;
    	private $strGraphic;
    	function getHeight(){
        		return $this->intHeight;
    	}
    	function getWidth(){
        		return $this->intWidth;
    	}
	function __construct($intHeight, $intWidth, $strGraphic){
		$this->intHeight = $intHeight;
		$this->intWidth = $intWidth;
		$this->strGraphic = $strGraphic;
	}
    function display() {
        $intHeight = $this->intHeight;
        $intWidth = $this->intWidth;
        $strGraphic = $this->strGraphic;
        echo "<p><img src='img/$strGraphic' width='$intWidth' height='$intHeight' alt='$strGraphic'/></p>";
    }
    function resize($intHeight, $intWidth) {
        $this->intHeight = $intHeight;
        $this->intWidth = $intWidth;
    }
}
?>
