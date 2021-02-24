<?php
class bucket {
	private $intMaxVolume;
	private $intCurrentVolume;
	private $strName;
	function __construct ($strName, $intMaxVol, $intCurrentVol) {
		$this->strName = $strName;
		$this->intMaxVolume = $intMaxVol;
		$this->intCurrentVolume = $intCurrentVol;
		$this->display();
	}
	function addLiquid($intVolume){
		$this->intCurrentVolume = $this->intCurrentVolume + $intVolume;
	}
	function getName(){
		return $this->strName;
	}
	function getRemainingSpace() {
        return $this->intMaxVolume - $this->intCurrentVolume;
	}
	function emptyDownDrain() {
        $this->intCurrentVolume = 0;
        echo "<p>Emptying the " . $this->strName . "</p>";
    }
 	function fillFromTap() {
        $this->intCurrentVolume = $this->intMaxVolume;
        echo "<p>Filling " . $this->strName . "</p>";
    }
	function display() {
		echo "<p>The " . $this->strName . " contains " . $this->intCurrentVolume . " litres out of a maximum of " . $this->intMaxVolume . " litres</p>";
	}
    function transfer($objOtherBucket) {
        $intSpace = $objOtherBucket->getRemainingSpace();
        if ($intSpace > $this->intCurrentVolume) {
            $objOtherBucket->addLiquid($this->intCurrentVolume);
      		echo "<p>Pouring " . $this->intCurrentVolume . " litres from the " . $this->strName . " into the " . $objOtherBucket->getName() . "</p>";
            $this->intCurrentVolume = 0;
        }
        else {
            $objOtherBucket->addLiquid($intSpace);
            $this->intCurrentVolume = $this->intCurrentVolume - $intSpace;
      		echo "<p>Pouring " . $intSpace . " litres from the " . $this->strName . " into the " . $objOtherBucket->getName() . "</p>";
        }
        $this->display();
        $objOtherBucket->display();
    }
}
?>
