<?php
declare (strict_types = 1);

namespace NNChutchikov\Spreadsheet\Tests;

use NNChutchikov\Spreadsheet\Spreadsheet\Row;
use NNChutchikov\Spreadsheet\Tests\SquareIntegerCellValidator;
use NNChutchikov\Spreadsheet\ValidatorResult;
use NNChutchikov\Spreadsheet\Validators\RowValidator;

class SquareDataRowValidator extends RowValidator
{
    protected function validateRow(Row $_row): ValidatorResult
    {
        $cellXValidator = new SquareIntegerCellValidator($_row->cell('A'));
        $cellXXValidator = new SquareIntegerCellValidator($_row->cell('B'));

        $results = new ValidatorResult();

        $results->add($cellXValidator->result());
        $results->add($cellXXValidator->result());

        $a = intval($_row->cell('A')->value());
        $b = intval($_row->cell('B')->value());

        if ($a * $a == $b) {
            $results->add(new ValidatorResult(true));
        } else {
            $results->add(new ValidatorResult(false, "Row {$_row->rowNumber()} => {$a} * {$a} != {$b}"));
        }

        return $results;
    }
}
