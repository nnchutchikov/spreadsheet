<?php
declare (strict_types = 1);

namespace Lalilalai\Spreadsheet\Validators;

use Lalilalai\Spreadsheet\Spreadsheet\Row;
use Lalilalai\Spreadsheet\ValidatorResult;
use Lalilalai\Spreadsheet\Validator;

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
