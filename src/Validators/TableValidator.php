<?php
declare (strict_types = 1);

namespace Lalilalai\Spreadsheet\Validators;

use Lalilalai\Spreadsheet\Spreadsheet\Table;
use Lalilalai\Spreadsheet\ValidatorResult;
use Lalilalai\Spreadsheet\Validator;

abstract class TableValidator extends Validator
{
    public function __construct(Table $_table)
    {
        $this->validateable = $_table;
        parent::__construct();
    }

    protected function validate($validateable): ValidatorResult
    {
        return $this->validateTable($this->validateable);
    }

    abstract protected function validateTable(Table $_table): ValidatorResult;
}
