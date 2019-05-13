<?php
declare (strict_types = 1);

namespace Lalilalai\Spreadsheet\Tests;

use Lalilalai\Spreadsheet\Loader;
use Lalilalai\Spreadsheet\Tests\SquareTableValidator;

/**
 * @covers Lalilalai\Spreadsheet\Validator
 * @covers Lalilalai\Spreadsheet\Validators\TableValidator
 * @covers Lalilalai\Spreadsheet\Validators\RowValidator
 * @covers Lalilalai\Spreadsheet\Validators\CellValidator
 * @covers Lalilalai\Spreadsheet\ValidatorResult
 */
class SpreadsheetValidatorTest extends \PHPUnit\Framework\TestCase
{
    private $validator = null;

    public function setUp(): void
    {
        $loader = new Loader('tests/files/test.csv');
        $this->validator = new SquareTableValidator($loader->table());
    }

    public function testValidCsv()
    {
        $result = $this->validator->result();
        $this->assertEquals(0, count($result->errors()));
    }

    public function testInvalidCsv()
    {
        $loader = new Loader('tests/files/testWrong.csv');
        $this->validator = new SquareTableValidator($loader->table());

        $result = $this->validator->result();
        $this->assertEquals(1, count($result->errors()));

        $this->assertEquals('Row 4 => 4 * 4 != 17', $result->errors()[0]);
    }
}
