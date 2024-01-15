<?php

abstract class AbstractCipher {
    abstract public function cipher($input);
}

class Cipher extends AbstractCipher {
    protected $record;
    protected $matrix;

    public function __construct($record, $matrix) {
        $this->record = $record;
        $this->matrix = $matrix;
    }

    public function cipher($input) {
        $cipheredText = $this->performCipher($input);

        return $cipheredText;
    }

    public function __toString() {
        return $this->cipher($this->record) . " => Cipher Object\n        (\n" .
               "            [record:protected] => " . $this->record . "\n" .
               "            [matrix:protected] => " . print_r($this->matrix, true) . "\n" .
               "        )\n)";
    }

    private function performCipher($input) {
        $cipheredText = '';
        foreach (str_split($input) as $char) {
            $cipheredText .= $this->matrix[array_search($char, $this->matrix)];
        }

        return $cipheredText;
    }
}