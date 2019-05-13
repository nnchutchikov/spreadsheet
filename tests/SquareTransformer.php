<?php
declare (strict_types = 1);

namespace NNChutchikov\Spreadsheet\Tests;

use NNChutchikov\Spreadsheet\Spreadsheet\Table;
use NNChutchikov\Spreadsheet\Tests\SquareTransformerRow;
use NNChutchikov\Spreadsheet\Transformer;

class SquareTransformer extends Transformer
{
    protected function transform(Table $_table): array
    {
        $rows = [];

        for ($i = 1; $i < $_table->count(); $i++) {
            $rows[] = (new SquareTransformerRow())->transform($_table->row($i));
        }

        return $rows;
    }
}
