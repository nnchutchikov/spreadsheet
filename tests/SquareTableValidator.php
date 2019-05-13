<?php
declare (strict_types = 1);

namespace NNChutchikov\Spreadsheet\Tests;

use NNChutchikov\Spreadsheet\Spreadsheet\Table;
use NNChutchikov\Spreadsheet\Tests\SquareDataRowValidator;
use NNChutchikov\Spreadsheet\Tests\SquareHeadRowValidator;
use NNChutchikov\Spreadsheet\ValidatorResult;
use NNChutchikov\Spreadsheet\Validators\TableValidator;

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
