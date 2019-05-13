<?php
declare (strict_types = 1);

namespace Lalilalai\Spreadsheet\Tests;

use Lalilalai\Spreadsheet\Spreadsheet\Row;
use Lalilalai\Spreadsheet\Tests\SquareConstCellValidator;
use Lalilalai\Spreadsheet\ValidatorResult;
use Lalilalai\Spreadsheet\Validators\RowValidator;

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
