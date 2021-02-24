<?php
class person5 {
	private $strFirstname;
	private $strSurname;
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
	private function display() {
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