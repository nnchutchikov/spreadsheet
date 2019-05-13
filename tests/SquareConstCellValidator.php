<?php
declare (strict_types = 1);

namespace Lalilalai\Spreadsheet\Tests;

use Lalilalai\Spreadsheet\Spreadsheet\Cell;
use Lalilalai\Spreadsheet\ValidatorResult;
use Lalilalai\Spreadsheet\Validators\CellValidator;

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
