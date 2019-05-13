<?php
declare (strict_types = 1);

namespace Lalilalai\Spreadsheet\Tests;

use Lalilalai\Spreadsheet\Spreadsheet\Table;
use Lalilalai\Spreadsheet\Tests\SquareDataRowValidator;
use Lalilalai\Spreadsheet\Tests\SquareHeadRowValidator;
use Lalilalai\Spreadsheet\ValidatorResult;
use Lalilalai\Spreadsheet\Validators\TableValidator;

class SquareTableValidator extends TableValidator
{
    protected function validateTable(Table $_table): ValidatorResult
    {
        $result = new ValidatorResult();

        $headRowValidator = new SquareHeadRowValidator($_table->row(0));
        $result->add($headRowValidator->result());

        for ($i = 1; $i < $_table->count(); $i++) {
            $dataRowValidator = new SquareDataRowValidator($_table->row($i));
            $result->add($dataRowValidator->result());
        }

        return $result;
    }
}
