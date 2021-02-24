<?php
class revisedperson {
	private $strFirstname;
	private $strSurname;
	function _destruct() {
	echo "<p>Destroying Class</p>";
	}
	function getFirstname() {
        return $this->strFirstname;
	}
	function getSurname() {
        return $this->strSurname;
	}
	function setFirstname($strFirstname) {
        $this->strFirstname = $strFirstname;
	}
	function setSurname($strSurname) {
        $this->strSurname = $strSurname;
	}
	function _construct ($strFirstname, $strSurname) {
        $this->setFirstname($strFirstname);
        $this->setSurname($strSurname);
        $this->display();
    	}
	function display() {
        echo "<p>Firstname: " . $this->strFirstname . "</p>";
        echo "<p>Surname: " . $this->strSurname . "</p>";
    	}
	function setDisplayFirstnameSurname($strFirstname, $strSurname) {
        $this->setFirstname($strFirstname);
        $this->setSurname($strSurname);
        $this->display();
    	}
}
?>
