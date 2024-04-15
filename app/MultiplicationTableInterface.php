<?php

namespace App;

interface MultiplicationTableInterface
{
    /**
     *   Creates a multiplication table of a specified size.
     *
     * @param int $size
     *   The size of the multiplication table.
     *
     * @return string
     *   An array of arrays, each containing the results of the multiplication.
     */
    public function generateTable(int $size): string;
}
