<?php
declare (strict_types = 1);

namespace NNChutchikov\Spreadsheet;

use NNChutchikov\Spreadsheet\ValidatorResult;

abstract class Validator
{
    private $result = null;
    private $validateable = null;

    public function __construct()
    {
        $this->result = $this->validate($this->validateable);
    }

    public function result(): ValidatorResult
    {
        return $this->result;
    }

    abstract protected function validate($_validateable): ValidatorResult;
}
