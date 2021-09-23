<?php

namespace Nube;

class NubeAnalizer {
    private $_txtToAnalize;
    private $_words = array();
    private $min = 0;
    private $max = 0;
    private $_analizedWords = array();
    public function __construct($strTextToAnalize)
    {
        $this->_txtToAnalize = preg_replace(
            "/[^\w\séóíúáñü]/",
            "",
            strtolower($strTextToAnalize)
        );
        $this->_words = explode(" ", $this->_txtToAnalize);
    }

    public function analizar()
    {
        $tmpArrPalabrasFreq = array();
        foreach ( $this->_words as $palabra ) {
            if (isset($tmpArrPalabrasFreq[$palabra])) {
                $tmpArrPalabrasFreq[$palabra] ++;
            } else {
                $tmpArrPalabrasFreq[$palabra] = 1;
            }
        }
        asort($tmpArrPalabrasFreq);
        foreach ($tmpArrPalabrasFreq as $palabra=>$freq) {
            $this->min = $freq;
            break;
        }
        arsort($tmpArrPalabrasFreq);
        foreach ($tmpArrPalabrasFreq as $palabra => $freq) {
            $this->max = $freq;
            break;
        }
        $this->_analizedWords = $tmpArrPalabrasFreq;
    }

    public function obtenerPalabras()
    {
        return array(
            "min"=>$this->min,
            "max"=>$this->max,
            "words"=> $this->_analizedWords
        );
    }

    /*

        a, b, c, a, d, e, f

        $alpha

        foreach ( $alpha as $item) {
            echo $item;

        }

        // a
        // b
        // c
        // a
        // d
        // e
        // f

     */









    public function __toString()
    {
        return "Palabras: " . count($this->_words) . "<br/>" . implode(", ", $this->_words);
    }
}

?>
