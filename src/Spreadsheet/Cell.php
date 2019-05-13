<?php
declare (strict_types = 1);

namespace NNChutchikov\Spreadsheet\Spreadsheet;

class Cell
{
    private $value = null;
    private $rowNumber = 0;
    private $columnName = '';

    public function __construct($_value, int $_rowNumber, string $_columnName)
    {
        $this->value = $_value;
        $this->rowNumber = $_rowNumber;
        $this->columnName = $_columnName;
    }

    public function value()
    {
        return $this->value;
    }

    public function rowNumber(): int
    {
        return $this->rowNumber;
    }

    public function columnName(): string
    {
        return $this->columnName;
    }
}
