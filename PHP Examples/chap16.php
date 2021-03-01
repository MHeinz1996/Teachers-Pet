<html>

<head>

 <title>T'Chris Chapter 16 Page</title>

 <link href="tchris-chap.css" rel="stylesheet" type = "text/css">


</head>

<body>


<center><h1>Chapter 16</h1></center><br>

<h2>Returning a Variable</h2>
<?php
class person {
	private $strFirstname = "Dean";
	private $strSurname = "Winchester";
	function getFirstname() {
        return $this->strFirstname;
	}
	function getSurname() {
        return $this->strSurname;
	}
}
$objHunter = new person;
echo "<p>Firstname: " . $objHunter->getFirstname() . "</p>";
echo "<p>Surname: " . $objHunter->getSurname() . "</p>";
?> 
<h2>Setting a Variable</h2>
<?php 
class person1 {
	private $strFirstname = "Dean";
	private $strSurname = "Winchester";
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
}
$objHunter = new person1;
$objHunter->setFirstname("Sam");
echo "<p>Firstname: " . $objHunter->getFirstname() . "</p>";
echo "<p>Surname: " . $objHunter->getSurname() . "</p>";


?> 
<h2>Multiple Objects</h2>
<?php
class person2 {
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
}
$objBobby = new person2;
$objBobby->setFirstname("Bobby");
$objBobby->setSurname("Singer");
echo "<p>Firstname: " . $objBobby->getFirstname() . "</p>";
echo "<p>Surname: " . $objBobby->getSurname() . "</p>";
$objJody = new person2;
$objJody->setFirstname("Jody");
$objJody->setSurname("Mills");
echo "<p>Firstname: " . $objJody->getFirstname() . "</p>";
echo "<p>Surname: " . $objJody->getSurname() . "</p>";
?> 

<h2>Methods Inside Classes</h2>
<?php
class person3 {
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
        echo "<p>Firstname: " . $this->strFirstname  . "</p>";
        echo "<p>Surname: " . $this->strSurname . "</p>";
    }
	function setDisplayFirstnameSurname($strFirstname, $strSurname) {
        $this->setFirstname($strFirstname);
        $this->setSurname($strSurname);
        $this->display();
    }
}
$objSimon = new person3;
$objSimon->setDisplayFirstnameSurname("Dean", "Winchester");
?> 

<h2>Creating Multiple Classes</h2>
<?php
class person4 {
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
        echo "<p>Firstname: " . $this->strFirstname  . "</p>";
        echo "<p>Surname: " . $this->strSurname . "</p>";
    }
	function setDisplayFirstnameSurname($strFirstname, $strSurname) {
        $this->setFirstname($strFirstname);
        $this->setSurname($strSurname);
        $this->display();
    }
}
class vehicle {
	private $strDescription;
	function getDescription() {
        return $this->strDescription;
	}
	function setDescription($strDescription) {
        $this->strDescription = $strDescription;
	}
}
$objSimon = new person4;
$objSimon->setDisplayFirstnameSurname("Dean", "Winchester");
$objCar = new vehicle;
$objCar->setDescription("1967 Impala");
echo "<p>Vehicle: " . $objCar->getDescription() . "</p>";
?> 

<h2>Using Multiple Source Files</h2>
<?php
function __autoload($class_name) {
    require_once $class_name . '.php';
}
$objHunter = new person5;
$objHunter->setDisplayFirstnameSurname("Dean", "Winchester");
$objCar = new vehicle1;
$objCar->setDescription("1967 Impala");
echo "<p>Vehicle: " . $objCar->getDescription() . "</p>";
?>
<h2>Arrays and Objects</h2>
<?php
//function __autoload($class_name) {
//    require_once $class_name . '.php';
//}
$objDean = new revisedperson("Dean", "Winchester");
$objSam = new revisedperson("Sam", "Winchester");
$objBobby = new revisedperson("Bobby", "Singer");
$objJody = new revisedperson("Jody", "Mills");
$objSamuel = new revisedperson("Samuel", "Campbell");
$arrPeople = array($objDean, $objSam, $objBobby, $objJody, $objSamuel);
foreach($arrPeople as $objThePerson)
	echo($objThePerson->display());
?>

<h2>Functions and Objects</h2>
<?php
function change($objPerson){
	$objPerson->setFirstname("Adam");
}
$objDean = new revisedperson("Dean", "Winchester");
change($objDean);
$objDean->display();
?>

<h2>Default Arguments</h2>
<?php
//function __autoload($class_name) {
//    require_once $class_name . '.php';
//}
$objSimon = new revisedagainperson("Bobby", "Singer");
$objSimon->display();
$objAnotherSimon = new revisedagainperson();
$objAnotherSimon->display();
?>

<h2>Objects Invoking Another</h2>
<?php
// finally it all comes together
//function __autoload($class_name) {
//    require_once $class_name . '.php';
//}
$objFiveBucket = new bucket("Five Litre Bucket",5,5);
$objThreeBucket = new bucket("Three Litre Bucket",3,0);
$objFiveBucket->transfer($objThreeBucket);
$objThreeBucket->emptyDownDrain();
$objFiveBucket->transfer($objThreeBucket);
$objFiveBucket->fillFromTap();
$objFiveBucket->transfer($objThreeBucket);
?>






</body>

</html>

