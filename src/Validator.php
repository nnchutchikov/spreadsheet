<?php
declare (strict_types = 1);

namespace Lalilalai\Spreadsheet;

use Lalilalai\Spreadsheet\ValidatorResult;

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
