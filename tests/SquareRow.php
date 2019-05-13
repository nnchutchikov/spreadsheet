<?php
declare (strict_types = 1);

namespace Lalilalai\Spreadsheet\Tests;

class SquareRow
{
    private $x;
    private $xx;

    public function __construct(int $_x, int $_xx)
    {
        $this->x = $_x;
        $this->xx = $_xx;
    }

    public function x(): int
    {
        return $this->x;
    }

    public function xx(): int
    {
        return $this->xx;
    }
}
