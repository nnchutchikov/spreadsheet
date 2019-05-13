<?php
declare (strict_types = 1);

namespace NNChutchikov\Spreadsheet\Validators;

use NNChutchikov\Spreadsheet\ValidatorResult;
use NNChutchikov\Spreadsheet\Spreadsheet\Cell;
use NNChutchikov\Spreadsheet\Validator;

abstract class CellValidator extends Validator
{
    public function __construct(Cell $_cell)
    {
        $this->validateable = $_cell;
        parent::__construct();
    }

    protected function validate($validateable): ValidatorResult
    {
        return $this->validateCell($this->validateable);
    }

    abstract protected function validateCell(Cell $_cell): ValidatorResult;
}
