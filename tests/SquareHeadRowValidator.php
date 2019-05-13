<?php
declare (strict_types = 1);

namespace NNChutchikov\Spreadsheet\Tests;

use NNChutchikov\Spreadsheet\Spreadsheet\Row;
use NNChutchikov\Spreadsheet\Tests\SquareConstCellValidator;
use NNChutchikov\Spreadsheet\ValidatorResult;
use NNChutchikov\Spreadsheet\Validators\RowValidator;

class SquareHeadRowValidator extends RowValidator
{
    protected function validateRow(Row $_row): ValidatorResult
    {
        $cellXValidator = new SquareConstCellValidator($_row->cell('A'), 'x');
        $cellXXValidator = new SquareConstCellValidator($_row->cell('B'), 'x*x');

        $results = new ValidatorResult();

        $results->add($cellXValidator->result());
        $results->add($cellXXValidator->result());

        return $results;
    }
}
