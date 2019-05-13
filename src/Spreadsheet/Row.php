<?php
declare (strict_types = 1);

namespace Lalilalai\Spreadsheet\Spreadsheet;

class Row
{
    private $rowNumber = 0;
    private $cells = [];
    private $count = 0;

    public function __construct(array $_row, int $_rowNumber)
    {
        $this->rowNumber = $_rowNumber;

        foreach ($_row as $cellColumnName => $cellValue) {
            $this->cells[$cellColumnName] = new Cell($cellValue, $_rowNumber, $cellColumnName);
            $this->count++;
        }
    }

    public function cell(string $_columnName): ?Cell
    {
        if (array_key_exists($_columnName, $this->cells)) {
            return $this->cells[$_columnName];
        }

        return null;
    }

    public function rowNumber(): int
    {
        return $this->rowNumber;
    }

    public function count(): int
    {
        return $this->count;
    }
}
