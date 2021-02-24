<?php
class vehicle1 {
	private $strDescription;
	function getDescription() {
        return $this->strDescription;
	}
	function setDescription($strDescription) {
        $this->strDescription = $strDescription;
	}
	function _construct ($strDescription) {
        $this->strDescription = $strDescription;
    }
}
?>