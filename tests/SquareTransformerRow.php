<?php
declare (strict_types = 1);

namespace NNChutchikov\Spreadsheet\Tests;

use NNChutchikov\Spreadsheet\Spreadsheet\Row;
use NNChutchikov\Spreadsheet\Tests\SquareRow;

class SquareTransformerRow
{
    public function transform(Row $_row): SquareRow
    {
        return new SquareRow(intval($_row->cell('A')->value()), intval($_row->cell('B')->value()));
    }
}
