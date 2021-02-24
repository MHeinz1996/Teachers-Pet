<?php
class rectangle extends shape {
    function area() {
        $intWidth = parent::getWidth();
        $intHeight = parent::getHeight();
        $intArea = $intWidth * $intHeight;
        echo "<p>Area is $intArea</p>";
    }
}
?>
