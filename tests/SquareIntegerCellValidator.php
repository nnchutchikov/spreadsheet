<?php
declare (strict_types = 1);

namespace Lalilalai\Spreadsheet\Tests;

use Lalilalai\Spreadsheet\Spreadsheet\Cell;
use Lalilalai\Spreadsheet\ValidatorResult;
use Lalilalai\Spreadsheet\Validators\CellValidator;

class SquareIntegerCellValidator extends CellValidator
{
    protected function validateCell(Cell $_cell): ValidatorResult
    {
        if (is_float($_cell->value()) || is_int($_cell->value())) {
            return new ValidatorResult(true);
        } elseif ($this->match($_cell->value(), '%^[0-9]+$%u')) {
            return new ValidatorResult(true);
        } else {
            return new ValidatorResult(false, "Cell {$cell->columnName()}:{$cell->rowNumber()} => not integer");
        }
    }
}
