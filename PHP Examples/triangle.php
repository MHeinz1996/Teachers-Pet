<?php
class triangle extends shape {
    function area() {
        $intWidth = parent::getWidth();
        $intHeight = parent::getHeight();
        $intArea = $intWidth * $intHeight/2;
        echo "<p>Area is $intArea</p>";
    }
}
?>
