<?php
declare (strict_types = 1);

namespace Lalilalai\Spreadsheet\Validators;

use Lalilalai\Spreadsheet\ValidatorResult;
use Lalilalai\Spreadsheet\Spreadsheet\Cell;
use Lalilalai\Spreadsheet\Validator;

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
