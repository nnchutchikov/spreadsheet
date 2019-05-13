<?php
declare (strict_types = 1);

namespace NNChutchikov\Spreadsheet\Validators;

use NNChutchikov\Spreadsheet\Spreadsheet\Row;
use NNChutchikov\Spreadsheet\ValidatorResult;
use NNChutchikov\Spreadsheet\Validator;

abstract class RowValidator extends Validator
{
    public function __construct(Row $_row)
    {
        $this->validateable = $_row;
        parent::__construct();
    }

    protected function validate($validateable): ValidatorResult
    {
        return $this->validateRow($this->validateable);
    }

    abstract protected function validateRow(Row $_row): ValidatorResult;
}
