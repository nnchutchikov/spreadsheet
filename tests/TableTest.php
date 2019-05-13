<?php
declare (strict_types = 1);

namespace NNChutchikov\Spreadsheet\Tests;

use NNChutchikov\Spreadsheet\Spreadsheet\Table;

/**
 * @covers NNChutchikov\Spreadsheet\Spreadsheet\Table
 * @covers NNChutchikov\Spreadsheet\Spreadsheet\Row
 * @covers NNChutchikov\Spreadsheet\Spreadsheet\Cell
 */
class TableTest extends \PHPUnit\Framework\TestCase
{
    private $table = null;

    protected function setUp(): void
    {
        $this->table = new Table([
            ['A' => 1, 'B' => 1],
            ['A' => 2, 'B' => 4],
            ['A' => 3, 'B' => 9],
            ['A' => 4, 'B' => 16],
        ]);
    }

    public function testTableCount()
    {
        $this->assertEquals(4, $this->table->count());
    }

    public function testTable()
    {
        $this->assertEquals(9, $this->table->row(2)->cell('B')->value());
    }

    public function testTableInvalidRow()
    {
        $this->assertNull($this->table->row(9999));
    }

    public function testRowInvalidCell()
    {
        $this->assertNull($this->table->row(1)->cell('AA'));
    }

    public function testRowCellCount()
    {
        $this->assertEquals(2, $this->table->row(1)->count());
    }

    public function testRowNumber()
    {
        $this->assertEquals(2, $this->table->row(2)->rowNumber());
    }

    public function testCellCoordinates()
    {
        $cell = $this->table->row(2)->cell('B');
        $this->assertEquals(2, $cell->rowNumber());
        $this->assertEquals('B', $cell->columnName());

    }
}
