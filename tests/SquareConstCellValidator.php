<?php
declare (strict_types = 1);

namespace NNChutchikov\Spreadsheet\Tests;

use NNChutchikov\Spreadsheet\Spreadsheet\Cell;
use NNChutchikov\Spreadsheet\ValidatorResult;
use NNChutchikov\Spreadsheet\Validators\CellValidator;

class SquareConstCellValidator extends CellValidator
{
    private $constValue = '';

    public function __construct(Cell $_cell, string $_constValue)
    {
        $this->constValue = $_constValue;
        parent::__construct($_cell);
    }

    protected function validateCell(Cell $_cell): ValidatorResult
    {
        $this->isValid = $_cell->value() == $this->constValue;

        if ($this->isValid) {
            return new ValidatorResult(true);
        } else {
            return new ValidatorResult(false, "Cell {$_cell->columnName()}:{$_cell->rowNumber()} => must be {$this->constValue}");
        }
    }
}
