<?php
declare (strict_types = 1);

namespace Lalilalai\Spreadsheet\Tests;

use Lalilalai\Spreadsheet\Spreadsheet\Row;
use Lalilalai\Spreadsheet\Tests\SquareRow;

class SquareTransformerRow
{
    public function transform(Row $_row): SquareRow
    {
        return new SquareRow(intval($_row->cell('A')->value()), intval($_row->cell('B')->value()));
    }
}
