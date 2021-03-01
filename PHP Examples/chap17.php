<html>

<head>

 <title>T'Chris Chapter 17 Page</title>

 <link href="tchris-chap.css" rel="stylesheet" type = "text/css">


</head>

<body>


<center><h1>Chapter 17</h1></center><br>

<h2>Returning a Variable</h2>
<?php
function __autoload($class_name) {
    require_once $class_name . '.php';
}
$objRectangle = new rectangle(100,50, "rectangle.gif");
$objRectangle->display();
$objRectangle->resize(50,100);
$objRectangle->display();
?>

<h2>Let's Do Some Shapes!</h2>
<?php
//function __autoload($class_name) {
//    require_once $class_name . '.php';
//}

$objRectangle = new rectangle(100,50, "rectangle.gif");
$objRectangle->display();
$objRectangle->resize(50,100);
$objRectangle->display();
$objSquare = new square(100, "square.gif");
$objSquare->display();
$objTriangle = new triangle(50,100, "triangle.gif");
$objTriangle->display();
$objEllipse = new ellipse(50,100, "ellipse.gif");
$objEllipse->display();
$objEllipse->resize(100,50);
$objEllipse->display();

?>

<h2>Or Better</h2>
<?php
//function __autoload($class_name) {
//    require_once $class_name . '.php';
//}

$objRectangle = new rectangle(100,50, "rectangle.gif");
$objRectangle->display();
$objRectangle->resize(50,100);
$objRectangle->display();
$objRectangle->area();
$objSquare = new square(100, "square.gif");
$objSquare->display();
$objTriangle = new triangle(50,100, "triangle.gif");
$objTriangle->display();
$objTriangle->area();
$objEllipse = new ellipse(50,100, "ellipse.gif");
$objEllipse->display();
$objEllipse->area();
?>

<h2>Polymorphism</h2>
<?php
//function __autoload($class_name) {
//    require_once $class_name . '.php';
//}
$objRectangle = new rectangle(100,50, "rectangle.gif");
$objSquare = new square(100, "square.gif");
$objTriangle = new triangle(50,100, "triangle.gif");
$objEllipse = new ellipse(50,100, "ellipse.gif");
$arrShapes = array ($objRectangle,$objSquare,$objTriangle,$objEllipse);
foreach ($arrShapes as $objShape){
	$objShape->display();
	$objShape->area();
}
?>

<h2>Static Members and Methods</h2>
<?php
class noInstancesRequiredClass {
    public static $strName = "Sam Winchester";
    public static function aStaticMethod() {
        echo "<p>" . self::$strName . "</p>";
    }
}
echo "<p>" . noInstancesRequiredClass::$strName . "</p>";
noInstancesRequiredClass::aStaticMethod();
$objExample = new noInstancesRequiredClass;
$objExample->aStaticMethod();
?>
<h2>Class Constants</h2>
<?php
class constantClass {
    const strName = "Dean Winchester";
    function showConstant() {
        echo "<p>" . self::strName . "</p>";
    }
}
echo "<p>" . constantClass::strName . "</p>";
$objExample = new constantClass;
$objExample->showConstant();
?>
<h2>Type Hinting</h2>
<?php
class typeHintingClass {
    private $arrNames = array();
    function __construct(array $arrNames) {
        $this->arrNames = $arrNames;
    }
    function showContents() {
        foreach ($this->arrNames as $arrItem)
            echo "<p>$arrItem</p>";
    }
    function showOtherClass(typeHintingClass $objOther) {
        $objOther->showContents();
    }
}
$arrNames = array("Sam","Dean","Cas");
$arrColors = array("Red","Green","Blue","Yellow");
$objNames = new typeHintingClass($arrNames);
$objNames->showContents();
$objColors = new typeHintingClass($arrColors);
$objNames->showOtherClass($objColors);
?>

<h2>Comparing Objects</h2>
<?php
class Person6 {
    public $strName;
    function __construct ($strName) {
        $this->strName = $strName;
    }
}
class AnotherPerson {
    public $strName;
    function __construct ($strName) {
        $this->strName = $strName;
    }
}
$objTchris = new Person6("Sam");  //what if this was Dean?
$objTchris2 = new Person6("Sam");
$objTchris3 = new AnotherPerson("Sam");
$objTchris4 = $objTchris;
if ($objTchris == $objTchris2)  //this is a comparison of objects, if the objects are the same, it echos that
    echo '<p>1 and 2 $objTchris == $objTchris2</p>';
if ($objTchris == $objTchris3)
    echo '<p>1 and 3 $objTchris == $objTchris3</p>';
if ($objTchris == $objTchris4)
    echo '<p>1 and 4 $objTchris == $objTchris4</p>';
if ($objTchris === $objTchris2)
    echo '<p>1 and 2 $objTchris === $objTchris2</p>';
if ($objTchris === $objTchris3)
    echo '<p>1 and 3 $objTchris === $objTchris3</p>';
if ($objTchris === $objTchris4)
    echo '<p>1 and 4 $objTchris === $objTchris4</p>';
?>

<h2>The 'Final' Keyword</h2>
<?php
class Person7 {
    private $strName;
    function __construct ($strName) {
        $this->strName = $strName;
    }
    final function showName() {
        echo "<p>" . $this->strName . "</p>";
    }
}
//class Student extends Person7 {
//    function showName() {
//    }
//}
echo "<p>This causes an error which our PHP does not know how to handle.</p>";
?>

<h2>Objects Interfaces</h2>
<?php
interface iPerson {
    public function showName();
    public function setSurname($strSurname);
    public function setFirstname($strFirstname);
}
class Person8 implements iPerson {
    private $strSurname;
    private $strFirstname;
    public function showName() {
        echo "<p>" . $this->strFirstname;
        echo " ";
        echo $this->strSurname . "</p>";
    }
    public function setSurname($strSurname) {
        $this->strSurname = $strSurname;
    }
    public function setFirstname($strFirstname) {
        $this->strFirstname = $strFirstname;
    }
}
$objSimon = new Person8;
$objSimon->setSurname("Singer");
$objSimon->setFirstname("Bobby");
$objSimon->showName();
?>





</body>

</html>

