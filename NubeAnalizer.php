<?php

namespace Nube;

class NubeAnalizer {
    private $_txtToAnalize;
    private $_words = array();
    public function __construct($strTextToAnalize)
    {
        $this->_txtToAnalize = preg_replace(
            "[^\w\séóíúáñü]",
            "",
            strtolower($strTextToAnalize)
        );
        $this->_words = explode(" ", $this->_txtToAnalize);
    }


    public function __toString()
    {
        return "Palabras: " . count($this->_words) . "<br/>" . implode(", ", $this->_words);
    }
}

?>
