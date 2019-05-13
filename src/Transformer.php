<?php
declare (strict_types = 1);

namespace Lalilalai\Spreadsheet;

use Lalilalai\Spreadsheet\Spreadsheet\Table;

abstract class Transformer
{
    private $table = null;

    public function __construct(Table $_table)
    {
        $this->table = $_table;
        $this->transformResult = $this->transform($this->table);
    }

    public function result(): array
    {
        return $this->transformResult;
    }

    abstract protected function transform(Table $_table): array;
}
