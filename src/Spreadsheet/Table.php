<?php
declare (strict_types = 1);

namespace NNChutchikov\Spreadsheet\Spreadsheet;

class Table
{
    private $rows = [];
    private $count = 0;

    public function __construct(array $_table)
    {
        $this->count = count($_table);

        for ($i = 0; $i < $this->count; $i++) {
            $this->rows[$i] = new Row($_table[$i], $i);
        }
    }

    public function row(int $_index): ?Row
    {
        if ($_index < 0 || $_index >= $this->count) {
            return null;
        }

        return $this->rows[$_index];
    }

    public function count(): int
    {
        return $this->count;
    }
}
